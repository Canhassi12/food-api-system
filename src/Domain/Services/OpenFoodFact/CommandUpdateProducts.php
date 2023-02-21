<?php

namespace Truckpag\Domain\Services\OpenFoodFact;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Truckpag\Infrastructure\Models\Product;

class CommandUpdateProducts
{
    private int $increment = 0;

    private function getApiFiles(): array
    {
        $files = Http::get(config('openfoodfacts.product.filesApi'))->body();

        return explode("\n", $files);
    }

    private function getProducts($file): bool|string
    {
        $response = Http::withHeaders([
            'Accept-Encoding' => 'gzip',
        ])->get(config('openfoodfacts.product.contentApi').$file);

        return gzdecode($response->body());
    }

    private function updateContentFromFiles($file): void
    {
        foreach($file as $item) {
            if ($this->increment == 11) {
                break;
            }

            $arrayProduct = array(json_decode($item));

            Product::query()->updateOrCreate([
                'code' => $arrayProduct[0]->code,
            ], [
                'code' => (int) preg_replace("/[^0-9]/", "", $arrayProduct[0]->code),
                'status' => "draft",
                'imported_t' => Carbon::now(),
                'url' => $arrayProduct[0]->url,
                'creator' => $arrayProduct[0]->creator,
                'created_t' => $arrayProduct[0]->created_t,
                'last_modified_t' => $arrayProduct[0]->last_modified_t,
                'product_name' => $arrayProduct[0]->product_name,
                'quantity' => $arrayProduct[0]->quantity,
                'brands' => $arrayProduct[0]->brands,
                'categories' => $arrayProduct[0]->categories,
                'labels' => $arrayProduct[0]->labels,
                'cities' => $arrayProduct[0]->cities,
                'purchase_places' => $arrayProduct[0]->purchase_places,
                'ingredients_text' => $arrayProduct[0]->ingredients_text,
                'traces' =>$arrayProduct[0]->traces,
                'serving_size' => $arrayProduct[0]->serving_size,
                'serving_quantity' => (float) $arrayProduct[0]->serving_quantity,
                'nutriscore_score' => (int) $arrayProduct[0]->nutriscore_score,
                'nutriscore_grade' => $arrayProduct[0]->nutriscore_grade,
                'main_category' => $arrayProduct[0]->main_category,
                'image_url' => $arrayProduct[0]->image_url,
            ]);
            $this->increment++;
        }
    }

    public function updateData(): void
    {
        $arrayFiles = $this->getApiFiles();

        foreach($arrayFiles as $file) {
            if ($file == "") {
                break;
            }

            $stringFiles = $this->getProducts($file);

            $this->updateContentFromFiles(explode("\n", $stringFiles));
        }
    }
}
