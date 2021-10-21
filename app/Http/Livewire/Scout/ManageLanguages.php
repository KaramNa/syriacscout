<?php

namespace App\Http\Livewire\Scout;

use Livewire\Component;
use App\Models\Scout\Language;

class ManageLanguages extends Component
{
    public $scoutLanguages;
    public $scoutId;
    public $language;
    public $scout_lang_level, $scout_lang;
    public $edit_scout_permission;


    public function mount()
    {
        $this->getLanguages();
    }
    public function render()
    {
        return view('livewire.scout.manage-languages');
    }

    public function getLanguages()
    {
        $this->scoutLanguages = Language::where("scout_id", $this->scoutId)->get();
    }
    public function reset_fields()
    {
        $this->reset("scout_lang");
        $this->reset("scout_lang_level");
    }

    public function addScoutLanguages()
    {
        $this->validate([
            "scout_lang" => "required",
            "scout_lang_level" => "required",
        ]);

        $scoutLanguages = Language::create([
            "scout_id" => $this->scoutId,
            "scout_lang" => $this->scout_lang,
            "scout_lang_level" => $this->scout_lang_level,
        ]);

        if ($scoutLanguages) {
            session()->flash("succeed", "تم إضافة لغة جديدة بنجاح");
            $this->getLanguages();
        } else {
            session()->flash("failed", "حدث خطأ ما, الرجاء المحاولة مجدداً");
        }
        $this->reset_fields();
        $this->dispatchBrowserEvent("CloseModal");
    }

    public function updateDelete($language_id, $action)
    {
        $this->language = Language::find($language_id);
        if ($action == 'update') {
            $this->dispatchBrowserEvent('openUpdateModal');
            $this->scout_lang = $this->language->scout_lang;
            $this->scout_lang_level = $this->language->scout_lang_level;
        } else {
            $this->dispatchBrowserEvent('openDeleteModal');
        }
    }

    public function deleteScoutLanguage()
    {
        if ($this->language) {
            $this->language->delete();
            session()->flash("succeed", "تم حذف اللغة بنجاح");
            $this->getLanguages();
        } else {
            session()->flash("failed", "حدث خطأ ما, الرجاء المحاولة مجدداً");
        }
        $this->dispatchBrowserEvent("CloseModal");
    }

    public function updateScoutLanguage()
    {
        $this->validate([
            "scout_lang_level" => "required",
        ]);
        if ($this->language) {
            $this->language->update(["scout_lang" => $this->scout_lang, "scout_lang_level" => $this->scout_lang_level]);
            session()->flash("succeed", "تم تعديل اللغة بنجاح");
            $this->getLanguages();
        } else {
            session()->flash("failed", "حدث خطأ ما, الرجاء المحاولة مجدداً");
        }
        $this->dispatchBrowserEvent("CloseModal");
    }
}