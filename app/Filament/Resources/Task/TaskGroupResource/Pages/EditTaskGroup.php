<?php

namespace App\Filament\Resources\Task\TaskGroupResource\Pages;

use App\Application\TaskGroups\UpdateTaskGroupUesCase;
use App\Filament\Resources\Task\TaskGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditTaskGroup extends EditRecord
{
    protected static string $resource = TaskGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model    
    {       
        $taskGroup = app(UpdateTaskGroupUesCase::class)->execute($record->id, $data);
        return $record;
    }       
}
