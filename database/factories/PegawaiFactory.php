<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'nik' => $this->faker->nik(),
            'nip' => $this->faker->nik(),
            'nama' => $this->faker->name(),
            'tmp_lahir' => $this->faker->city(),
            'tgl_lahir' => $this->faker->date(),
            'pendidikan' => $this->faker->city(),
            'email' => $this->faker->city(),
            'no_hp' => $this->faker->nik(),
            'tmt_sk' => $this->faker->date(),
            'tmt' => $this->faker->date(),
            'tmt_masuk' => $this->faker->date(),
            'j_kelamin' => $this->faker->randomElement(['L', 'P', 'O']),
            'kategori_id' => mt_rand(1, 2),
            'jabatan_id' => mt_rand(1, 2),
            'bidang_id' => mt_rand(1, 2),
            'golongan_id' => mt_rand(1, 2),
            'fungsional_id' => mt_rand(1, 2),
            'unit_id' => mt_rand(1, 2)

        ];
    }
}
