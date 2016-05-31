<?php

// referencing routers
use App\Http\Routers\CounselorsRouter;
use App\Http\Routers\PagesRouter;
use App\Http\Routers\AdminRouter;
use App\Http\Routers\SandboxRouter;
use App\Http\Routers\AuthRouter;

// using the routers references above
CounselorsRouter::setRoutes();
PagesRouter::setRoutes();
AdminRouter::setRoutes();
SandboxRouter::setRoutes();
AuthRouter::setRoutes();
