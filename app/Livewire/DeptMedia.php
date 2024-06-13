<?php

namespace App\Livewire;

use App\Livewire\Forms\event;
use App\Livewire\Forms\logoval;
use App\Models\Event as ModelsEvent;
use App\Models\External_logo;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class DeptMedia extends Component
{
    use WithFileUploads;
    public event $event;
    public logoval $logoval;
    public function render()
    {

        $logo1 = External_logo::where('logo_no','=','1')->first();
        if($logo1){
            $this->logoval->name = $logo1->name;
            $this->logoval->url = $logo1->url;

            // $this->minister->profile_image = $logo1->profile_image;

        }
        $logo2 = External_logo::where('logo_no','=','2')->first();
        return view('livewire.dept-media',[
            'logo1' => $logo1,
            'logo2' => $logo2,
        ]);
    }

    public function editleftlogo(){
        $logo1 = External_logo::where('logo_no','=','1')->first();
        $validated = $this->logoval->validate();

        $validated['logo_no']=$this->logoval->logo_no = "1";

        if($logo1 === null){
            if($this->logoval->logoimage){
                $validated['logoimage'] = $this->logoval->logoimage->store('externallogo/logo1','public');
            }
            External_logo::create($validated);
            session()->flash('success_card', 'External logo is added successfully');
            $this->dispatch('flashMessage');
        }
        else{
            if($this->logoval->logoimage){
                $validated['logoimage'] = $this->logoval->logoimage->store('externallogo/logo1','public');
                if($logo1->logoimage){
                    Storage::disk('public')->delete($logo1->logoimage);

                }

            }
            elseif($logo1->logoimage){
                $validated['logoimage'] = $logo1->logoimage;
            }

            $logo1->update($validated);
            session()->flash('success_card', 'Logo 1 is updated successfully');
            $this->dispatch('flashMessage');



        }
    }

    public function deletelogo1(){
        $logo1 = External_logo::where('logo_no','=','1')->first();
        if($logo1->logoimage){
            Storage::disk('public')->delete($logo1->logoimage);
        }
        $logo1->delete();
        $this->logoval->reset(['name','url','logoimage']);
    }

    public function addevent(){
        $validated = $this->event->validate();
        // dd($validated);
        // $id = 10;
        // if($this->event->images){
        //     foreach($validated['images'] as $image){

        //         $image->store('events','public');
        //     }
        // }

        $event = ModelsEvent::create([
            'title' => $validated['title'],
            'date' => $validated['date'],
            'description' => $validated['description'],
        ]);

        if($this->event->images){
            foreach($validated['images'] as $image){
                $path = $image->store('events/'.$event->id.'/images','public');
                Gallery::create([
                    'event_id' => $event->id,
                    'images' => $path,
               ]);

            }
        }





    }
}
