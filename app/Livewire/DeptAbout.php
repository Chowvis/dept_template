<?php

namespace App\Livewire;


use App\Livewire\Forms\minister;
use App\Models\About;
use App\Models\Headofminister;
use Illuminate\Http\Request;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class DeptAbout extends Component
{
    use WithFileUploads;

    #[Rule('required|min:2')]
    public $about;

    public minister $minister;

    public function render()
    {
        $dbabout = About::where('id','=',1)->first();
        $dbaddress = About::where('id','=',1)->first();
        $card1 = Headofminister::where('card_place','=','1')->first();

        if($card1){
            $this->minister->name = $card1->name;
            $this->minister->postname = $card1->postname;
            $this->minister->email = $card1->email;
            $this->minister->phone = $card1->phone;
            $this->minister->twitter = $card1->twitter;
            $this->minister->facebook =$card1->facebook;
            $this->minister->instagram = $card1->instagram;
            // $this->minister->profile_image = $card1->profile_image;

        }
        if($dbabout === null){
            $dbabout = "No data availale";
            $this->minister->name = $card1->name;
            return view('livewire.dept-about',[
                'dbabout' => $dbabout,
                'dbaddress' => $dbaddress,
                'card1' => $card1,
            ]);
        }
        else{

            $dbabout = $dbabout->about;
            $this->about = $dbabout;

            return view('livewire.dept-about',[
            'dbabout' => $this->about,
            'dbaddress' => $dbaddress,
            'card1' => $card1,
        ]);
        }

    }

    public function editabout(){ //save
        $validated = $this->validateOnly('about');//aboutdept

        $about = About::where('id','=',1)->first();

        if($about === null){

            About::create($this->only(['about']));
            session()->flash('success', 'About successfully updated.');
            $this->dispatch('flashMessage');
        }
        else{

            $about->update($this->only(['about']));
            session()->flash('success', 'About successfully updated.');
            $this->dispatch('flashMessage');

        }
    }

    public function editaddress(Request $request){
        $validate= request()->validate([
            'deptname' => 'required|min:4',
            'street' => 'required',
            'state' => 'required',
            'city' => 'required',
            'pincode' => 'required|max:6',
            'district'=>'required',
            'lat' => 'nullable',
            'lng' => 'nullable',
        ]);



        // $validated = $this->address->validate();//aboutdept

        $about = About::where('id','=',1)->first();

        if($about === null){

            About::create($validate);
            return redirect()->route('showeditabout')->with('success','Address is updated successfully');
            // session()->flash('success', 'Address successfully updated.');
            // $this->dispatch('flashMessage');
        }
        else{
            $about->update($validate);
            return redirect()->route('showeditabout')->with('success','Address is updated successfully');


        }
    }


    public function show(){     //this renders dashboard to page
        return view('navigationtab.dashboard');
    }

    public function showeditabout(){     //this renders dashboard to page
        $dbaddress = About::where('id','=',1)->first();

        return view('navigationtab.dashboardaddress.editaddress',[
            'dbaddress' => $dbaddress
        ]);
    }



    public function editleftcard(){
        // dd('hello');
        $validated = $this->minister->validate();

        $validated['card_place']=$this->minister->card_place = "1";

        if($this->minister->profile_image){
            $validated['profile_image'] = $this->minister->profile_image->store('card1','public');
        }


        $card1 = Headofminister::where('card_place','=','1')->first();

        if($card1 === null){

            Headofminister::create($validated);
            session()->flash('success_card', 'Head of department is added successfully');
            $this->dispatch('flashMessage');
        }
        else{

            $card1->update($validated);
            session()->flash('success_card', 'Head of department is added successfully');
            $this->dispatch('flashMessage');

        }

    }

    public function editrightcard(){
        // dd('hello');
        $validated = $this->minister->validate();
        $validated['card_place']=$this->minister->card_place = "2";
        dd($validated);

        // if($this->minister->profile_image){
        //     $validated['profile_image'] = $this->minister->profile_image->store('card1','public');
        // }


        // $card1 = Headofminister::where('id','=',1)->first();

        // if($card1 === null){

        //     Headofminister::create($validated);
        //     session()->flash('success_card', 'Head of department is added successfully');
        //     $this->dispatch('flashMessage');
        // }
        // else{

        //     $card1->update($validated);
        //     session()->flash('success_card', 'Head of department is added successfully');
        //     $this->dispatch('flashMessage');

        // }

    }



}
