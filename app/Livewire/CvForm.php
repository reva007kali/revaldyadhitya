<?php

namespace App\Livewire;

use App\Models\Cv;
use App\Models\Skill;
use Livewire\Component;
use App\Models\Language;
use App\Models\Education;
use App\Models\CvTemplate;
use App\Models\Experience;
use App\Models\Certificate;
use Livewire\WithFileUploads;
use Filament\Forms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use App\Models\SeamanExperience;

class CvForm extends Component
{
    use WithFileUploads;    

    public $templates;

    public $cv_template_id;

    public $photo;
    public $payment_proof;
    public $full_name;
    public $birth_date;
    public $gender;
    public $address;
    public $phone;
    public $email;
    public $summary;
    public $cv_type = 'umum';

    public $educations = [];
    public $experiences = [];
    public $skills = [];
    public $languages = [];
    public $certificates = [];
    public $seaman_experiences = [];


    protected $rules = [
        'photo' => 'nullable|image|max:2048', // <= validasi foto max 2MB
        'payment_proof' => 'nullable|image|max:2048', // <= validasi foto max 2MB
        'full_name' => 'required|string|max:255',
        'birth_date' => 'nullable|date',
        'gender' => 'nullable|string',
        'address' => 'nullable|string',
        'phone' => 'nullable|string|max:20',
        'email' => 'nullable|email',
        'summary' => 'nullable|string',
        'cv_type' => 'required|in:umum,pelaut',
        'cv_template_id' => 'required|exists:cv_templates,id',


        // Nested validations
        'educations.*.school_name' => 'required|string|max:255',
        'educations.*.major' => 'nullable|string|max:255',
        'educations.*.degree' => 'nullable|string|max:255',
        'educations.*.start_year' => 'nullable|integer',
        'educations.*.end_year' => 'nullable|integer',

        'experiences.*.company_name' => 'required|string|max:255',
        'experiences.*.position' => 'nullable|string|max:255',
        'experiences.*.start_date' => 'nullable|date',
        'experiences.*.end_date' => 'nullable|date',
        'experiences.*.description' => 'nullable|string',

        'skills.*.skill_name' => 'required|string|max:255',
        'skills.*.level' => 'nullable|string|max:255',

        'languages.*.language_name' => 'required|string|max:255',
        'languages.*.proficiency' => 'nullable|string|max:255',

        'certificates.*.certificate_name' => 'required|string|max:255',
        'certificates.*.certificate_number' => 'nullable|string|max:255',
        'certificates.*.issuer' => 'nullable|string|max:255',
        'certificates.*.issue_date' => 'nullable|date',

        'seaman_experiences.*.vessel_name' => 'required|string|max:255',
        'seaman_experiences.*.vessel_type' => 'nullable|string|max:255',
        'seaman_experiences.*.flag' => 'nullable|string|max:255',
        'seaman_experiences.*.rank' => 'nullable|string|max:255',
        'seaman_experiences.*.gt' => 'nullable|integer',
        'seaman_experiences.*.dwt' => 'nullable|integer',
        'seaman_experiences.*.engine' => 'nullable|string|max:255',
        'seaman_experiences.*.sign_on' => 'nullable|date',
        'seaman_experiences.*.sign_off' => 'nullable|date',
        'seaman_experiences.*.company' => 'nullable|string|max:255',
        'seaman_experiences.*.remarks' => 'nullable|string',
    ];

    // mount cv data ke cv form
    public function mount()
    {
        // Ambil semua template dari database
        $this->templates = CvTemplate::all();
    }

    public function addItem($field)
    {
        $this->$field[] = [];
    }

    public function removeItem($field, $index)
    {
        unset($this->$field[$index]);
        $this->$field = array_values($this->$field);
    }

    public function save()
    {
        $this->validate();

        

        // Upload photo jika ada
        $photoPath = null;
        if ($this->photo) {
            $photoPath = $this->photo->store('photos', 'public');
        }
        $paymentProofPath = null;
        if ($this->payment_proof) {
            $paymentProofPath = $this->payment_proof->store('payments', 'public');
        }

        $cv = Cv::create([
            'full_name' => $this->full_name,
            'birth_date' => $this->birth_date,
            'gender' => $this->gender,
            'address' => $this->address,
            'phone' => $this->phone,
            'email' => $this->email,
            'summary' => $this->summary,
            'cv_type' => $this->cv_type,
            'photo' => $photoPath, // Simpan path foto
            'payment_proof' => $paymentProofPath, // Simpan path foto
            'cv_template_id' => $this->cv_template_id,

        ]);

        foreach ($this->educations as $item)
            Education::create(array_merge($item, ['cv_id' => $cv->id]));
        foreach ($this->experiences as $item)
            Experience::create(array_merge($item, ['cv_id' => $cv->id]));
        foreach ($this->skills as $item)
            Skill::create(array_merge($item, ['cv_id' => $cv->id]));
        foreach ($this->languages as $item)
            Language::create(array_merge($item, ['cv_id' => $cv->id]));
        foreach ($this->certificates as $item)
            Certificate::create(array_merge($item, ['cv_id' => $cv->id]));
        foreach ($this->seaman_experiences as $item)
            SeamanExperience::create(array_merge($item, ['cv_id' => $cv->id]));

        

        session()->flash('cv_submitted', true);
        $this->reset();

        return redirect()->route('cv.success');
    }



    public function render()
    {
        return view('livewire.cv-form');
    }
}
