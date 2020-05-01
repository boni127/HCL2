<?php
	class HCL2Gateway extends IPSModule {

		public function Create()
		{
			//Never delete this line!
			parent::Create();
			$this->RegisterPropertyString('Host', '');
            $this->RegisterPropertyString('User', '');
            $this->RegisterPropertyString('Password', '');
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

		public function ForwardData($JSONString)
		{
			$data = json_decode($JSONString);
			IPS_LogMessage("HCL2 IO FRWD", utf8_decode($data->Buffer));
			$Text='return from GW';
			$r = $this->SendDataToChildren(json_encode(Array("DataID" => "{0C08A0EE-B493-0F95-3B22-FBC8731F3FE3}","Buffer" => $Text)));
		}

		public function Send(string $Text)
		{
			$this->SendDataToChildren(json_encode(Array("DataID" => "{0C08A0EE-B493-0F95-3B22-FBC8731F3FE3}", "Buffer" => $Text)));
		}

	}