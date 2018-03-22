Vagrant.configure(2) do |config|

  config.vm.box = "ubuntu/xenial64"
  
  config.proxy.http     = "http://10.67.1.60:3128/"
  config.proxy.https    = "http://10.67.1.60:3128/"
  config.proxy.no_proxy = "localhost,127.0.0.1,.example.com"
  
  config.vm.define "usb-portal" do |machine|
    machine.vm.network "private_network", ip: "192.168.56.101"
  end

  # port forwarding
  #config.vm.network "forwarded_port", guest: 631, host: 6311
  #config.vm.network "forwarded_port", guest: 22, host: 7418
  #config.vm.network "forwarded_port", guest: 80, host: 8081
  
  config.vm.synced_folder ".", "/vagrant", owner: "www-data"

  config.vm.provider "virtualbox" do |vb|
     # Customize the amount of memory on the VM:
     vb.memory = "1024"
  end
  
  # Run Ansible to perform provisioning
  config.vm.provision "ansible_local" do |ansible|
    ansible.playbook       = "playbook.yml"
    # ansible.verbose        = true
    ansible.install        = true
  end
end
