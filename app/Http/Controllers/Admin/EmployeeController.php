<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Mostra la lista di tutti i dipendenti.
     */
    public function index()
    {
        $employees = Employee::whereNull('deleted_at')->get();
        return view('admin.employees.index', compact('employees'));
    }

    /**
     * Mostra il form per creare un nuovo dipendente.
     */
    public function create()
    {
        $roles = ['Banconista', 'Reparto Pizze', 'Supervisore'];
        return view('admin.employees.create', compact('roles'));
    }

    /**
     * Salva un nuovo dipendente nel database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|in:Banconista,Reparto Pizze,Supervisore',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'nullable|string|max:20',
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')->with('success', 'Dipendente aggiunto con successo.');
    }

    /**
     * Mostra i dettagli di un singolo dipendente.
     */
    public function show(Employee $employee)
    {
        return view('admin.employees.show', compact('employee'));
    }

    /**
     * Mostra il form per modificare un dipendente esistente.
     */
    public function edit(Employee $employee)
    {
        $roles = ['Banconista', 'Reparto Pizze', 'Supervisore'];
        return view('admin.employees.edit', compact('employee', 'roles'));
    }

    /**
     * Aggiorna i dati di un dipendente esistente nel database.
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|in:Banconista,Reparto Pizze,Supervisore',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'phone' => 'nullable|string|max:20',
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'Dipendente aggiornato con successo.');
    }

    /**
     * Elimina (soft delete) un dipendente dal database.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Dipendente eliminato con successo.');
    }
}