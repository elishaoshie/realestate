namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Property;

class PropertyManager extends Component
{
    use WithFileUploads;

    public $properties, $propertyId, $location, $image, $area, $beds, $garage, $baths, $price;
    public $isEditMode = false;

    protected $rules = [
        'location' => 'required|string|max:255',
        'image' => 'nullable|image|max:2048',
        'area' => 'required|numeric',
        'beds' => 'required|integer|min:1',
        'garage' => 'required|integer|min:0',
        'baths' => 'required|integer|min:1',
        'price' => 'required|numeric|min:0',
    ];

    public function render()
    {
        $this->properties = Property::all();
        return view('livewire.admin.property-manager');
    }

    public function resetFields()
    {
        $this->propertyId = null;
        $this->location = '';
        $this->image = null;
        $this->area = '';
        $this->beds = '';
        $this->garage = '';
        $this->baths = '';
        $this->price = '';
        $this->isEditMode = false;
    }

    public function store()
    {
        $this->validate();

        $imagePath = $this->image ? $this->image->store('property_images', 'public') : null;

        Property::create([
            'location' => $this->location,
            'image' => $imagePath,
            'area' => $this->area,
            'beds' => $this->beds,
            'garage' => $this->garage,
            'baths' => $this->baths,
            'price' => $this->price,
        ]);

        session()->flash('message', 'Property Added Successfully');
        $this->resetFields();
    }

    public function edit($id)
    {
        $property = Property::findOrFail($id);
        $this->propertyId = $property->id;
        $this->location = $property->location;
        $this->area = $property->area;
        $this->beds = $property->beds;
        $this->garage = $property->garage;
        $this->baths = $property->baths;
        $this->price = $property->price;
        $this->isEditMode = true;
    }

    public function update()
    {
        $this->validate();

        $property = Property::findOrFail($this->propertyId);

        if ($this->image) {
            $imagePath = $this->image->store('property_images', 'public');
            $property->image = $imagePath;
        }

        $property->update([
            'location' => $this->location,
            'area' => $this->area,
            'beds' => $this->beds,
            'garage' => $this->garage,
            'baths' => $this->baths,
            'price' => $this->price,
        ]);

        session()->flash('message', 'Property Updated Successfully');
        $this->resetFields();
    }

    public function delete($id)
    {
        Property::findOrFail($id)->delete();
        session()->flash('message', 'Property Deleted Successfully');
    }
}
