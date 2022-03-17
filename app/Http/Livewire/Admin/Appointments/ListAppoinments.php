<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Models\Appointment;
use Livewire\Component;

class ListAppoinments extends Component
{
    public $appointment;
    public function render()
    {
        $appointments = Appointment::latest()->paginate(5);
        return view('livewire.admin.appointments.list-appoinments', [
            'appointments' => $appointments,
        ]);
    }
}
