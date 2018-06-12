<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\ProjectTechnology;
use App\ProjectFeature;

class ManagementController extends Controller
{
    public function trancateProjects()
    {
    	//Delete all projects
    	Project::truncate();
    	// Delete project features
    	ProjectFeature::truncate();
    	//Delete Project Technologies
    	ProjectTechnology::truncate();
    	//Delete project images from storage
    	File::delete('images/projects');
    	return 'Project data was removed!';

    }
}
