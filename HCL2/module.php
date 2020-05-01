<?php
	class HCL2 extends IPSModule {

		public function Create()
		{
			//Never delete this line!
			parent::Create();

			$this->ConnectParent("{404710B4-A57C-C5D6-CF13-F024C6FB1DD8}");
			$this->RegisterVariableString("hcl_zwave_version", "Zwave-Version");
            $this->RegisterVariableString("hcl_zwave_company", "Zwave-Company");
            $this->RegisterVariableInteger("hcl_zwave_bright","BRIGHTNESS");
          
            $this->RegisterPropertyInteger("HclId",0);
 

		}

		public function Destroy()
		{
			//Never delete this line!
			parent::Destroy();
		}

		public function ApplyChanges()
		{
			//Never delete this line!
			parent::ApplyChanges();
		}

		public function MeineErsteEigeneFunktion() {
            // Selbsterstellter Code
            }

        public function SetBrightness(int $value) {
            return $this->SetValue('hcl_zwave_bright', 110);
			}
			
		public function Send2(string $Text)
		{
			$Text .= $this->ReadPropertyInteger("HclId");
			$this->SendDataToParent(json_encode(Array("DataID" => "{E26417E8-749E-87DE-6062-16FEFB7E6447}", "Buffer" => $Text)));

		}

		public function ReceiveData($JSONString)
		{
			$data = json_decode($JSONString);
			$id= $this->ReadPropertyInteger("HclId");
			IPS_LogMessage("HCL2 Device RECV($id)", utf8_decode($data->Buffer));
		}

	}