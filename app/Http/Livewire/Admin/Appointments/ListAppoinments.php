<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Models\Appointments;
use Livewire\Component;

class ListAppoinments extends Component
{
    public $appointment;
    public function render()
    {
        $appointments = Appointments::with('client')->latest()->paginate(20);
        return view('livewire.admin.appointments.list-appoinments', [
            'appointments' => $appointments,
        ]);
    }
}
