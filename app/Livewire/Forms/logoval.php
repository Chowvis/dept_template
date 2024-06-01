<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class logoval extends Form
{
    #[Rule('required|min:3')]
    public $name;
    #[Rule('required|min:3')]
    public $url;
    #[Rule('nullable|image|max:1024')]
    public $logoimage;
    public $logo_no;
}
