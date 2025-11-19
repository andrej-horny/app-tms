<?php

namespace App\Filament\Resources\Task\TaskGroupResource\Pages;

use App\Application\TaskGroups\CreateTaskGroupUesCase;
use App\Filament\Resources\Task\TaskGroupResource;
use Dpb\Package\TaskMS\Infrastructure\Persistence\Eloquent\Mappings\TaskGroupMapper;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateTaskGroup extends CreateRecord
{
    protected static string $resource = TaskGroupResource::class;

    protected function handleRecordCreation(array $data): Model    
    {       
        $taskGroup = app(CreateTaskGroupUesCase::class)->execute($data);
        return app(TaskGroupMapper::class)->toEloquent($taskGroup);
    }    
}
