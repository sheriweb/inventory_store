<?php

namespace App\Jobs;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

use Illuminate\Bus\Batchable;


class ImportProduct implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public $chunk;
    public $header;

    public function __construct($chunk,$header)
    {
        $this->chunk   = $chunk;
        $this->header = $header;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        foreach ( $this->chunk as $key => $row) {

            if ($row[0] != null) {
                $parent = Category::updateOrCreate(
                    ['category_name' => $row[0]], [
                    'slug' => Str::slug($row[0]),
                    'category_image' => $row[4],
                ]);
                if ($row[1] != null) {
                    $parent = $parent->children()->updateOrCreate(
                        ['category_name' => $row[1]],
                        [
                            'slug' => $row[1],
                            'category_image' => $row[4]
                        ]);
                }
                if ($row[2] != null) {
                    $parent = $parent->children()->updateOrCreate(
                        ['category_name' => $row[2]],
                        [
                            'slug' => $row[2],
                            'category_image' => $row[4]
                        ]);
                }
                if ($row[3] != null) {
                    $parent = $parent->children()->updateOrCreate(
                        ['category_name' => $row[3]],
                        [
                            'slug' => $row[3],
                            'category_image' => $row[4]
                        ]);
                }


                $product = [
                    'category_id' => $parent->id,
                    'product_name' => $row[8],
                    'product_slug' => Str::slug($row[8]),
                    'price' => $row[10],
                    'retail_price' => $row[11],
                    'refurbished_price' => $row[14],
                    'sale_refurbished_price' => $row[13],
                    'quantity' => $row[12],
                    'refurbished_quantity' => $row[15],
                    'product_section' => 'generalProduct',
                    'brand' => $row[9],
                    'weight' => $row[16],
                    'dimensions' => $row[17],
                    'capacity' => $row[22],
                    'capacity_watts' => null,
                    'technology' => $row[23],
                    'processing_speed' => $row[25],
                    'no_of_ports' => $row[29],
                    'memory' => $row[26],
                    'storage' => $row[27],
                    'screen_size' => $row[32],
                    'form_factor' => $row[24],
                    'generation' => $row[28],
                    'product_type' => $row[30],
                    'cache_type' => $row[31],
                    'screen_resolution' => $row[33],
                    'status' => 1,
                ];
                $product = Product::updateOrCreate(['sku' => $row[7]], $product);

                $storagePath = 'public/productImages';
                if($row[20] != null){
                    $product->files()->where('file_type','productUpload')->delete();
                    $images = explode(',',$row[20]);
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
                if($row[18] != null){
                    $product->files()->where('file_type','imageThumbnail')->delete();
                    $getImagePath = 'productImages/' . $row[18] ;
                    $product->files()->create([
                        'name' => $row[18],
                        'random' => $row[18],
                        'path' => $getImagePath,
                        'file_type' => 'imageThumbnail'
                    ]);
                }
            }


        }
    }
}
