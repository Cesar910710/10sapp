<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Flight;

class Flights extends Component
{
   public $flights, $city, $airline, $flight_id, $arrival, $user_id, $fid;
    public $isOpen = false;
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $this->flights = Flight::all();
        return view('livewire.flights');
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModal()
    {
        $this->isOpen = true;
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isOpen = false;
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->city = '';
        $this->airline = '';
        $this->flight_id = '';
        $this->arrival = '';
        $this->user_id = '';
    }
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'city' => 'required',
            'airline' => 'required',
            'flight_id' => 'required',
        ]);
   
        Flight::updateOrCreate(['id' => $this->fid], [
            'city' => $this->city,
            'airline' => $this->airline,
            'flight_id' => $this->flight_id,
            'arrival' => 1,
            'user_id' => auth('sanctum')->user()->id,
        ]);
  
        session()->flash('message', 
            $this->flight_id ? 'Vuelo actualizado correctamente.' : 'Vuelo creado correctamente.');
  
        $this->closeModal();
        $this->resetInputFields();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $flight = Flight::findOrFail($id);
        $this->city = $flight->city;
        $this->airline = $flight->airline;
        $this->flight_id = $flight->flight_id; 
        $this->arrival = $flight->arrival; 
        $this->user_id = $flight->user_id; 
    
        $this->openModal();
    }
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Flight::find($id)->delete();
        session()->flash('message', 'Flight Deleted Successfully.');
    }
}

?>