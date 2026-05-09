<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class TaskController extends Controller
{
    use AuthorizesRequests;

    protected TaskService $taskService;

    /**
     * TaskController constructor.
     *
     * @param TaskService $taskService
     */
    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $this->authorize('viewAny', Task::class);

        $tasks = $this->taskService->getUserTasks(auth()->user());

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $this->authorize('create', Task::class);

        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TaskRequest $request
     * @return RedirectResponse
     */
    public function store(TaskRequest $request): RedirectResponse
    {
        $this->authorize('create', Task::class);

        $this->taskService->createTask(auth()->user(), $request->validated());

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Tâche créée avec succès !');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Task $task
     * @return View
     */
    public function edit(Task $task): View
    {
        $this->authorize('update', $task);

        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TaskRequest $request
     * @param Task $task
     * @return RedirectResponse
     */
    public function update(TaskRequest $request, Task $task): RedirectResponse
    {
        $this->authorize('update', $task);

        $this->taskService->updateTask($task, $request->validated() + ['completed' => $request->has('completed')]);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Tâche mise à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Task $task
     * @return RedirectResponse
     */
    public function destroy(Task $task): RedirectResponse
    {
        $this->authorize('delete', $task);

        $this->taskService->deleteTask($task);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Tâche supprimée avec succès !');
    }
}
