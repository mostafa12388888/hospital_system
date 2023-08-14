<?php

namespace App\Http\Livewire\GrouptService;

use App\Models\Group;
use App\Models\Service;
use Livewire\Component;

class GroupeServices extends Component
{
    public $GroupsItems =[],$allServices =[],$total,$discount_value,$taxes,$name_group,$notes,$ServiceSaved;
    public $showTable=true,$updateTable=false,$showId,$Sarviceupdate=false;
    public function mount(){
$this->allServices =Service::all();
    }
    public function render()
    {
        $total = 0;
        foreach ($this->GroupsItems as $groupItem) {
            if ($groupItem['is_saved'] && $groupItem['service_price'] && $groupItem['quantity']) {
                $total += $groupItem['service_price'] * $groupItem['quantity'];
            }
        }
        return view('livewire.groupt-service.groupe-services', [
           'groups'=>Group::all(),
            'subtotal' => $Total_after_discount = $total - ((is_numeric($this->discount_value) ? $this->discount_value : 0)),
            'total' => $Total_after_discount * (1 + (is_numeric($this->taxes) ? $this->taxes : 0) / 100)
        ]);
    }

    public function addService()
    {
        foreach ($this->GroupsItems as $key => $groupItem) {
            if (!$groupItem['is_saved']) {
                $this->addError('GroupsItems.' . $key, 'يجب حفظ هذا الخدمة قبل إنشاء خدمة جديدة.');
                return;
            }
        }

        $this->GroupsItems[] = [
            'service_id' => '',
            'quantity' => 1,
            'is_saved' => false,
            'service_name' => '',
            'service_price' => 0
        ];

        $this->ServiceSaved = false;
    }




    public function saveService($index)
    {
        $this->resetErrorBag();
        $product = $this->allServices->find($this->GroupsItems[$index]['service_id']);
        $this->GroupsItems[$index]['service_name'] = $product->name;
        $this->GroupsItems[$index]['service_price'] = $product->price;
        $this->GroupsItems[$index]['is_saved'] = true;
    }
    public function editService($index)
    {
        foreach ($this->GroupsItems as $key => $groupItem) {
            if (!$groupItem['is_saved']) {
                $this->addError('GroupsItems.'. $key, 'This line must be saved before editing another.');
                return;
            }
        }

        $this->GroupsItems[$index]['is_saved'] = false;
    }
    public function removeService($index)
    {
        unset($this->GroupsItems[$index]);
        $this->GroupsItems = array_values($this->GroupsItems);
    }
    public function saveGroup(){
        $total=0;
        foreach($this->GroupsItems as $groupItem){
            if ($groupItem['is_saved'] && $groupItem['service_price'] && $groupItem['quantity']) 
            $total+=$groupItem['service_price']*$groupItem['quantity'];
        }
        if($this->updateTable){
            $groupsFind=Group::findOrFail($this->showId);$groupsFind->update([
                'discount_value'=>$this->discount_value,
                'total_before_descount'=>$total,
                'tax_rate'=>$this->taxes,
                'total_after_discount'=>$total-((is_numeric($this->discount_value) ? $this->discount_value : 0)),
                'name'=>$this->name_group,
                'notes'=>$this->notes,
            ]);
            foreach ($this->GroupsItems as $GroupsItem)
            $groupsFind->service_group()->sync($GroupsItem['service_id'],["quantity"=>$GroupsItem["quantity"]]);
            $this->Sarviceupdate=true;
        }else{
        $groupServices=new Group();
       
$groupServices->total_before_descount=$total;
$groupServices->discount_value=$this->discount_value;
$groupServices->total_after_discount=$total-((is_numeric($this->discount_value) ? $this->discount_value : 0));

$groupServices->total_with_tax=$groupServices->total_after_discount*(1 + (is_numeric($this->taxes) ? $this->taxes : 0) / 100);
$groupServices->tax_rate=$this->taxes;
$groupServices->save();
$groupServices->notes=$this->notes;
$groupServices->name=$this->name_group;
$groupServices->save();


foreach ($this->GroupsItems as $GroupsItem) {
  
    $groupServices->service_group()->attach($GroupsItem['service_id'],["quantity"=>$GroupsItem["quantity"]]);
}

$this->reset('GroupsItems', 'name_group', 'notes');
$this->discount_value = 0;
$this->ServiceSaved = true;

    }
    $this->showTable=true;
}
public function show_form_add(){
    $this->showTable=false;
}
public function edit($id){
    $this->showTable=false;
$this->updateTable=true;
$this->showId=$id;
$groupe=Group::findOrFail($id);
$this->reset('name_group','notes','GroupsItems');
$this->name_group=$groupe->name;
$this->notes=$groupe->notes;
$this->ServiceSaved=false;
$this->discount_value=intval($groupe->discount_value);
// dd($groupe->service_group);
foreach($groupe->service_group as $groupes){
  
    $this->GroupsItems[] = [
        'service_id' => $groupes->id,
        'quantity' => $groupes->pivot->quantity,
        'is_saved' => true,
        'service_name' => $groupes->name,
        'service_price' => $groupes->price,
    ];
}
}


public function delete($id){
Group::destroy($id);
}
}
