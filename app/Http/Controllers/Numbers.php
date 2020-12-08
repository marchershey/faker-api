<?php

namespace App\Http\Controllers;

use Faker\Factory as Faker;
use Illuminate\Http\Request;

class Numbers extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->faker = Faker::create();
    }

    public function response($response)
    {
        return response()->json($response);
    }

    /** -- */

    public function number(Request $request)
    {
        $request = $this->validate($request, [
            'length' => 'numeric|min:1|max:9',
        ], [
            'length.numeric' => 'Length must be numeric',
            'length.max' => 'Length can not be greater than 9',
        ]);

        return $this->response(
            $this->faker->randomNumber(
                $this->request['length'],
                true
            )
        );
    }

    public function digit(Request $request)
    {
        $request = $this->validate($request, [
            'exclude' => 'nullable|numeric|min:1|max:9',
            'notNull' => 'nullable|boolean',
        ], [
            'exclude.numeric' => 'The excluding number must be numeric.',
            'exclude.min' => 'The excluding number cannot be less than than 1. Use \'notNull=1\'',
            'exclude.max' => 'The excluding number cannot be greater than 9.',
            'notNull.boolean' => 'Must be set to 1 or 0.',
        ]);

        if (isset($request['exclude'])) {
            if (isset($request['notNull']) && (bool) $request['notNull']) {
                do {
                    $response = $this->faker->randomDigitNot($request['exclude']);
                } while ($response === 0);
            } else {
                $response = $this->faker->randomDigitNot($request['exclude']);
            }
        } else {
            if (isset($request['notNull']) && (bool) $request['notNull']) {
                do {
                    $response = $this->faker->randomDigit();
                } while ($response === 0);
            } else {
                $response = $this->faker->randomDigit();
            }
        }

        return $this->response($response);

    }

    public function float(Request $request)
    {
        $request = $this->validate($request, [
            'decimals' => 'nullable|numeric',
        ], [
            'decimals.numeric' => 'The decimals parameter must be numeric.',
        ]);

        if (isset($request['decimals'])) {
            $response = $this->faker->randomFloat($request['decimals']);
        } else {
            $response = $this->faker->randomFloat();
        }

        return $this->response($response);
    }
}
