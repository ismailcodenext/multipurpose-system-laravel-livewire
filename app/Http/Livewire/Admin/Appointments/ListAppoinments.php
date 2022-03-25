<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Models\Appointments;
use Livewire\Component;

class ListAppoinments extends Component
{
    protected $listeners = ['deleteConfirmed' => 'deleteAppointment'];

    public $appointment;

    public $appointmentIdBeingRemoved = null;

    public function confirmAppointmentRemoval($appointmentId)
    {
      $this->appointmentIdBeingRemoved = $appointmentId;

      $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteAppointment()
    {
       $appointment = Appointments::findOrFail($this->appointmentIdBeingRemoved);
       $appointment->delete();
       $this->dispatchBrowserEvent('deleted', ['message' => 'Appointment deleted successfully']);
    }
    public function render()
    {
        $appointments = Appointments::with('client')->latest()->paginate(20);
        return view('livewire.admin.appointments.list-appoinments', [
            'appointments' => $appointments,
        ]);
    }
}
