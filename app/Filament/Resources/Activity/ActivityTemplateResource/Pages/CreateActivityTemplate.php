<?php

namespace App\Filament\Resources\Activity\ActivityTemplateResource\Pages;

use App\Application\Activities\CreateActivityTemplateUesCase;
use App\Filament\Resources\Activity\ActivityTemplateResource;
use Dpb\Package\TaskMS\Infrastructure\Persistence\Eloquent\Mappings\Activities\ActivityTemplateMapper;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;

class CreateActivityTemplate extends CreateRecord
{
    protected static string $resource = ActivityTemplateResource::class;

    public function getTitle(): string | Htmlable
    {
        return __('activities/activity-template.form.create_heading');
    }     

    protected function handleRecordCreation(array $data): Model    
    {       
        $template = app(CreateActivityTemplateUesCase::class)->execute($data);
        return app(ActivityTemplateMapper::class)->toEloquent($template);
    }     
}
