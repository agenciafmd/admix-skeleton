<?php

namespace :namespace_vendor\:namespace_skeleton_name\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use :namespace_vendor\:namespace_skeleton_name\:skeleton_name;

class :skeleton_nameController extends Controller
{
    public function index(Request $request)
    {
        session()->put('backUrl', request()->fullUrl());

        $query = QueryBuilder::for(:skeleton_name::class)
            ->defaultSorts(config(':package_name.default_sort'))
            ->allowedSorts($request->sort)
            ->allowedFilters((($request->filter) ? array_keys($request->get('filter')) : []));

        if ($request->is('*/trash')) {
            $query->onlyTrashed();
        }

        $view['items'] = $query->paginate($request->get('per_page', 50));

        return view(':vendor/:skeleton_name_plural_lower::index', $view);
    }

    public function create(:skeleton_name $:skeleton_name_lower)
    {
        $view['model'] = $:skeleton_name_lower;

        return view(':vendor/:skeleton_name_plural_lower::form', $view);
    }

    public function store(Request $request)
    {
        if (:skeleton_name::create($request->validated())) {
            flash('Item inserido com sucesso.', 'success');
        } else {
            flash('Falha no cadastro.', 'danger');
        }

        return ($url = session()->get('backUrl')) ? redirect($url) : redirect()->route('admix.:skeleton_name_plural_lower.index');
    }

    public function show(:skeleton_name $:skeleton_name_lower)
    {
        $view['model'] = $:skeleton_name_lower;

        return view(':vendor/:skeleton_name_plural_lower::form', $view);
    }

    public function edit(:skeleton_name $:skeleton_name_lower)
    {
        $view['model'] = $:skeleton_name_lower;

        return view(':vendor/:skeleton_name_plural_lower::form', $view);
    }

    public function update(:skeleton_name $:skeleton_name_lower, Request $request)
    {
        if ($:skeleton_name_lower->update($request->validated())) {
            flash('Item atualizado com sucesso.', 'success');
        } else {
            flash('Falha na atualização.', 'danger');
        }

        return ($url = session()->get('backUrl')) ? redirect($url) : redirect()->route('admix.:skeleton_name_plural_lower.index');
    }

    public function destroy(:skeleton_name $:skeleton_name_lower)
    {
        if ($:skeleton_name_lower->delete()) {
            flash('Item removido com sucesso.', 'success');
        } else {
            flash('Falha na remoção.', 'danger');
        }

            return ($url = session()->get('backUrl')) ? redirect($url) : redirect()->route('admix.:skeleton_name_plural_lower.index');
        }

    public function restore($id)
    {
        $model = :skeleton_name::onlyTrashed()
            ->find($id);

        if (!$model) {
            flash('Item já restaurado.', 'danger');
        } elseif ($model->restore()) {
            flash('Item restaurado com sucesso.', 'success');
        } else {
            flash('Falha na restauração.', 'danger');
        }

        return ($url = session()->get('backUrl')) ? redirect($url) : redirect()->route('admix.:skeleton_name_plural_lower.index');
    }

    public function batchDestroy(Request $request)
    {
        if (:skeleton_name::destroy($request->get('id', []))) {
            flash('Item removido com sucesso.', 'success');
        } else {
            flash('Falha na remoção.', 'danger');
        }

        return ($url = session()->get('backUrl')) ? redirect($url) : redirect()->route('admix.:skeleton_name_plural_lower.index');
    }

    public function batchRestore(Request $request)
    {
        $model = :skeleton_name::onlyTrashed()
            ->whereIn('id', $request->get('id', []))
            ->restore();

        if ($model) {
            flash('Item restaurado com sucesso.', 'success');
        } else {
            flash('Falha na restauração.', 'danger');
        }

        return ($url = session()->get('backUrl')) ? redirect($url) : redirect()->route('admix.:skeleton_name_plural_lower.index');
    }
}
