<?php

namespace Api\Tasks;

interface TaskInterface
{

    /**
     * Run the task
     * @return mixed
     */
    public function run();
}
