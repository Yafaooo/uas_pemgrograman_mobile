import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ToastController } from '@ionic/angular';
import { PostProvider } from '../../providers/post-provider';
@Component({
 selector: 'app-tab2',
 templateUrl: 'tab2.page.html',
 styleUrls: ['tab2.page.scss']
})
export class Tab2Page implements OnInit {
 nama: string = '';
 usia: string = '';
 kota: string = '';
 jenis_kelamin: string = '';
 nohp: string = '';
 jenislomba: string = '';
 asal: string = '';
 jenjang: string = '';
 constructor(
 private router: Router,
 public toastController: ToastController,
 private postPvdr: PostProvider,
 ) { 
 
 }
 ngOnInit() {
 }
 async addRegister() {
 if (this.nama == '') {
 const toast = await this.toastController.create({
 message: 'Nama lengkap harus di isi',
 duration: 2000
 });
 toast.present();
 } else if (this.usia == '') {
 const toast = await this.toastController.create({
 message: 'usia harus di isi',
 duration: 2000
 });
 toast.present();
 } else if (this.kota == '') {
 const toast = await this.toastController.create({
 message: 'kota di isi',
 duration: 2000
 });
 toast.present();
 } else if (this.jenis_kelamin == '') {
 const toast = await this.toastController.create({
    message: 'jenis harus di isi',
    duration: 2000
    });
    toast.present();
    } else if (this.nohp == '') {
    const toast = await this.toastController.create({
    message: 'nohp harus di isi',
    duration: 2000
    });

    toast.present();
  } else if (this.jenislomba == '') {
  const toast = await this.toastController.create({
  message: 'jenislomba harus di isi',
  duration: 2000
  });

  toast.present();
    } else if (this.asal == '') {
    const toast = await this.toastController.create({
    message: 'asal harus di isi',
    duration: 2000
    });

    toast.present();
  } else if (this.jenjang == '') {
  const toast = await this.toastController.create({
  message: 'jenjang harus di isi',
  duration: 2000
  });

    toast.present();
    } else {
    let body = {
    nama: this.nama,
    usia: this.usia,
    kota: this.kota,
    jenis_kelamin: this.jenis_kelamin,
    nohp: this.nohp,
    jenislomba: this.jenislomba,
    asal: this.asal,
    jenjang: this.jenjang,
    aksi: 'add_register'
    };
    this.postPvdr.postData(body, 'action.php').subscribe(async data => {
    var alertpesan = data.msg;
    if (data.success) {
    this.router.navigate(['/tab3']);
    const toast = await this.toastController.create({
    message: 'Selamat! Pendaftaran lomba sukses.',
    duration: 2000
    });
    toast.present();
    } else {
    const toast = await this.toastController.create({
    message: alertpesan,
    duration: 2000
    });
    }
    });
    }
    }
   }