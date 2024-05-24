<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class minister2 extends Form
{
    #[Rule('required|min:3')]
    public $name2;
    #[Rule('required|min:3')]
    public $postname2;
    #[Rule('required|min:3')]
    public $email2;
    #[Rule('required|min:10')]
    public $phone2;
    #[Rule('')]
    public $twitter2;
    #[Rule('')]
    public $facebook2;
    #[Rule('')]
    public $instagram2;
    #[Rule('required|image|max:1024')]
    public $profile_image2;
    public $card_place2;
}
