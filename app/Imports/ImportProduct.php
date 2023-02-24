<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportProduct implements ToModel,WithHeadingRow,WithBatchInserts, WithEvents, ShouldQueue
{
    /**
     * @param array $row
     *
     */



    public function model(array $row)
    {

        if ($row['parent_category'] != null) {
            $parent = Category::updateOrCreate(
                ['category_name' => $row['parent_category']], [
                'slug' => Str::slug($row['parent_category']),
                'category_image' => $row['category_image_name'],
            ]);
            if ($row['category_level_1'] != null) {
                $parent = $parent->children()->updateOrCreate(
                    ['category_name' => $row['category_level_1']],
                    [
                     'slug' => $row['category_level_1'],
                     'category_image' => $row['category_image_name']
                    ]);
            }
            if ($row['category_level_2'] != null) {
                $parent = $parent->children()->updateOrCreate(
                    ['category_name' => $row['category_level_2']],
                    [
                        'slug' => $row['category_level_2'],
                        'category_image' => $row['category_image_name']
                    ]);
            }
            if ($row['category_level_3'] != null) {
                $parent = $parent->children()->updateOrCreate(
                    ['category_name' => $row['category_level_3']],
                    [
                        'slug' => $row['category_level_3'],
                        'category_image' => $row['category_image_name']
                    ]);
            }

            $product = [
                'category_id' => $parent->id,
                'product_name' => $row['product_name'],
                'product_slug' => Str::slug($row['product_name']),
                'price' => $row['sale_new_price'],
                'retail_price' => $row['new_retail_price'],
                'refurbished_price' => $row['refurbished_price'],
                'sale_refurbished_price' => $row['sale_refurbished_price'],
                'quantity' => $row['new_quantity'],
                'refurbished_quantity' => $row['refurbished_quantity'],
                'product_section' => 'generalProduct',
                'brand' => $row['brand'],
                'weight' => $row['weight'],
                'dimensions' => $row['dimensions'],
                'capacity' => $row['capacity'],
                'capacity_watts' =>$row['capacity'],
                'technology' => $row['technology'],
                'processing_speed' => $row['processing_speed'],
                'no_of_ports' => $row['no_of_ports'],
                'memory' => $row['memory'],
                'storage' => $row['storage'],
                'screen_size' => $row['screen_size'],
                'form_factor' => $row['form_factor'],
                'generation' => $row['generation'],
                'product_type' => $row['product_type'],
                'cache_type' => $row['cache_type'],
                'screen_resolution' => $row['screen_resolution'],
                'status' => 1,
            ];

            $product = Product::updateOrCreate(['sku' => $row['sku']], $product);
            $storagePath = 'public/productImages';
            if($row['images'] != null){
                $product->files()->where('file_type','productUpload')->delete();
                $images = explode(',',$row['images']);
                    foreach ($images as $key => $file) {
                        $getImagePath = 'productImages/' . $file;
                        $product->files()->create([
                            'name' => $file,
                            'random' => $file,
                            'path' => $getImagePath,
                            'file_type' => 'productUpload'
                        ]);
                    }
            }
            if($row['image_thumbnil'] != null){
                $product->files()->where('file_type','imageThumbnail')->delete();
                $getImagePath = 'productImages/' . $row['image_thumbnil'] ;
                $product->files()->create([
                    'name' => $row['image_thumbnil'],
                    'random' => $row['image_thumbnil'],
                    'path' => $getImagePath,
                    'file_type' => 'imageThumbnail'
                ]);
            }
        }
    }

    public function batchSize(): int
    {
        return 500;
    }




    public function registerEvents(): array
    {
        return [];
    }
}
