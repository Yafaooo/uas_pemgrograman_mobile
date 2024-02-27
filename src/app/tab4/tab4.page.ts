// tab4.page.ts

import { Component } from '@angular/core';

@Component({
  selector: 'app-tab4',
  templateUrl: 'tab4.page.html',
  styleUrls: ['tab4.page.scss'],
})
export class Tab4Page {
  kejurnasAnnouncements = [
    {
      title: 'Pengumuman Kejuaraan ENGLAND OPEN 2023',
      content: 'Kevin sanjaya dan gideon berhasil taklukkan penantang dari seluruh dunia.',
      image: 'assets/img/KEVIN.jpg',
      date: new Date('2023-12-01'),
    },
    {
      title: 'Pengumuman Kejuaraan INDONESIA OPEN',
      content: 'Indonesia Berhasil membawa peringkat 1 di INDONESIA OPEN 2023.',
      image: 'assets/img/KEVIN1.jpg',
      date: new Date('2023-12-07'),
    },
    {
      title: 'Pengumuman Kejuaraan CATURNAS 2023',
      content: 'Indonesia Berhasil membawa peringkat 1 di CATURNAS 2023.',
      image: 'assets/img/catur.jpg',
      date: new Date('2023-12-09'),
    },
    {
      title: 'Pengumuman Kejuaraan FOOTBALL',
      content: 'Indonesia Berhasil LOLOS DI WORLD CUP 2023 DI QUALIFIKASI QATAR.',
      image: 'assets/img/OK.jpeg',
      date: new Date('2023-12-07'),
    },

   
  ];
}
