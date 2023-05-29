<?php

namespace App\Domain\Game\Request;

use Illuminate\Support\Facades\Validator;
use App\Exceptions\ValidationException;

class GameCreateRequest
{
    public $name;
    public $developer;
    public $publisher;

    public function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->developer = $data['developer'];
        $this->publisher = $data['publisher'];
    }

    public function validate()
    {
        $validator = Validator::make([
            'name' => $this->name,
            'developer' => $this->developer,
            'publisher' => $this->publisher,
        ], [
            'name' => 'required',
            'developer' => 'required',
            'publisher' => 'required',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }
}
