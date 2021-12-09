<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'category' => $this->faker->randomElement(['manual', 'electrico', 'no_manual', 'agricola']),
            'description' => $this->faker->paragraph(),
            'size' => $this->faker->numberBetween(1, 10),
            'price' => $this->faker->numberBetween(10000, 800000),
            'stock' => $this->faker->numberBetween(1, 10000),
            'state' => $this->faker->numberBetween(0, 1),
            'vendorId' => $this->faker->randomElement(['1007965298']),
            'photo_path' => $this->faker->randomElement([
                '/images/products/1636125592.jpg',
                '/images/products/1636125728.jpg',
                '/images/products/1636125881.jpg',
                '/images/products/1636125940.jpg'
            ]),
            'portada1' => $this->faker->randomElement([
                '/images/products/portadas/1007965298/1636125592.jpg',
                '/images/products/portadas/1007965298/1636125592_2.jpg',
                '/images/products/portadas/1007965298/1636125592_3.jpg',
                '/images/products/portadas/1007965298/1636125728.jpg',
                '/images/products/portadas/1007965298/1636125728_2.jpg',
                '/images/products/portadas/1007965298/1636125728_3.jpg',
                '/images/products/portadas/1007965298/1636125881.jpg',
                '/images/products/portadas/1007965298/1636125881_2.jpg'
            ]),
            'portada2' => $this->faker->randomElement([
                '/images/products/portadas/1007965298/1636125592_2.jpg',
                '/images/products/portadas/1007965298/1636125592_3.jpg',
                '/images/products/portadas/1007965298/1636125728.jpg',
                '/images/products/portadas/1007965298/1636125728_2.jpg',
                '/images/products/portadas/1007965298/1636125728_3.jpg',
                '/images/products/portadas/1007965298/1636125881.jpg',
                '/images/products/portadas/1007965298/1636125881_2.jpg',
                '/images/products/portadas/1007965298/1636125592.jpg'
            ]),
            'portada3' => $this->faker->randomElement([
                '/images/products/portadas/1007965298/1636125592_3.jpg',
                '/images/products/portadas/1007965298/1636125728.jpg',
                '/images/products/portadas/1007965298/1636125728_2.jpg',
                '/images/products/portadas/1007965298/1636125728_3.jpg',
                '/images/products/portadas/1007965298/1636125881.jpg',
                '/images/products/portadas/1007965298/1636125881_2.jpg',
                '/images/products/portadas/1007965298/1636125592.jpg',
                '/images/products/portadas/1007965298/1636125592_2.jpg'
            ])
        ];

    }
}
