<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class minister2 extends Form
{
    #[Rule('required|min:3')]
    public $name;
    #[Rule('required|min:3')]
    public $postname;
    #[Rule('required|min:3')]
    public $email;
    #[Rule('required|min:10')]
    public $phone;
    #[Rule('')]
    public $twitter;
    #[Rule('')]
    public $facebook;
    #[Rule('')]
    public $instagram;
    #[Rule('nullable|image|max:1024')]
    public $profile_image;
    public $card_place;
}
