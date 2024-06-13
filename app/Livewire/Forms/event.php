<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class event extends Form
{
    #[Rule('required|min:2')]
    public $title;
    #[Rule('required')]
    public $date;
    #[Rule('required|min:2')]
    public $description;
    #[Validate(['images.*' => 'nullable|image|max:15360'])]
    public $images = [];
}
