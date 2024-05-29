<?php

namespace App\Livewire;


use App\Livewire\Forms\minister;
use App\Livewire\Forms\minister2;
use App\Models\About;
use App\Models\Headofminister;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class DeptAbout extends Component
{
    use WithFileUploads;

    #[Rule('required|min:2')]
    public $about;

    public minister $minister;
    public minister2 $minister2;

    public function render()
    {
        $dbabout = About::where('id','=',1)->first();
        $dbaddress = About::where('id','=',1)->first();
        $card1 = Headofminister::where('card_place','=','1')->first();
        $card2 = Headofminister::where('card_place','=','2')->first();

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
        if($card2){
            $this->minister2->name = $card2->name;
            $this->minister2->postname = $card2->postname;
            $this->minister2->email = $card2->email;
            $this->minister2->phone = $card2->phone;
            $this->minister2->twitter = $card2->twitter;
            $this->minister2->facebook =$card2->facebook;
            $this->minister2->instagram = $card2->instagram;
            // $this->minister->profile_image = $card1->profile_image;

        }
        if($dbabout === null){
            $dbabout = "No data availale";
            // $this->minister->name = $card1->name;
            return view('livewire.dept-about',[
                'dbabout' => $dbabout,
                'dbaddress' => $dbaddress,
                'card1' => $card1,
                'card2' => $card2,
            ]);
        }
        else{

            $dbabout = $dbabout->about;
            $this->about = $dbabout;

            return view('livewire.dept-about',[
            'dbabout' => $this->about,
            'dbaddress' => $dbaddress,
            'card1' => $card1,
            'card2' => $card2,
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


// editing the card 1
    public function editleftcard(){
        // dd('hello');
        $card1 = Headofminister::where('card_place','=','1')->first();
        $validated = $this->minister->validate();

        $validated['card_place']=$this->minister->card_place = "1";

        if($card1 === null){
            if($this->minister->profile_image){
                $validated['profile_image'] = $this->minister->profile_image->store('card1','public');
            }
            Headofminister::create($validated);
            session()->flash('success_card', 'Head of department is added successfully');
            $this->dispatch('flashMessage');
        }
        else{
            if($this->minister->profile_image){
                $validated['profile_image'] = $this->minister->profile_image->store('card1','public');
                if($card1->profile_image){
                    Storage::disk('public')->delete($card1->profile_image);
                    $this->deleteTempFiles();
                }

            }
            elseif($card1->profile_image){
                $validated['profile_image'] = $card1->profile_image;
            }

            $card1->update($validated);
            session()->flash('success_card', 'Head of department is added successfully');
            $this->dispatch('flashMessage');



        }


    }

    // deleteing the card 1
    public function deletecard1(){

        $card1 = Headofminister::where('card_place','=','1')->first();
        if($card1->profile_image){
            Storage::disk('public')->delete($card1->profile_image);

        }
        $card1->delete();
    }

    public function editrightcard(){
        $card2 = Headofminister::where('card_place','=','2')->first();
        $validated = $this->minister2->validate();

        $validated['card_place']=$this->minister2->card_place = "2";

        if($card2 === null){
            if($this->minister2->profile_image){
                $validated['profile_image'] = $this->minister2->profile_image->store('card2','public');
            }
            Headofminister::create($validated);
            session()->flash('success_card', 'Head of department is added successfully');
            $this->dispatch('flashMessage');
        }
        else{
            if($this->minister2->profile_image){
                $validated['profile_image'] = $this->minister2->profile_image->store('card2','public');
                if($card2->profile_image){
                    Storage::disk('public')->delete($card2->profile_image);
                    $this->deleteTempFiles();
                }

            }
            elseif($card2->profile_image){
                $validated['profile_image'] = $card2->profile_image;
            }

            $card2->update($validated);
            session()->flash('success_card', 'Head of department is updated successfully');
            $this->dispatch('flashMessage');



        }
    }
    public function deletecard2(){

        $card2 = Headofminister::where('card_place','=','2')->first();
        if($card2->profile_image){
            Storage::disk('public')->delete($card2->profile_image);

        }
        $card2->delete();
    }


}
