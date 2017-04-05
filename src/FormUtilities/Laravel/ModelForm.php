<?php

namespace DanSmith\FormUtilities\Laravel;

abstract class ModelForm {

    public function persist()
    {
        return $this->updating() ? $this->update() : $this->store();
    }

    private function updating()
    {
        return $this->request->route()->hasParameter($this->getIdentifier());
    }

    private function update()
    {
        $this->model->find($this->request->route()->parameter($this->getIdentifier()))->update($this->request->all());
    }

    private function store()
    {
        $this->model->create($this->request->all());
    }

    private function getIdentifier()
    {
        return strtolower((new \ReflectionClass($this->model))->getShortName());
    }
}