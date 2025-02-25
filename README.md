# Offer Management - Laravel & Docker

Offer Management, Kullanıcıların teklif formu oluşturup görüntüleyebildikleri basic bir yapı sunmakta olup teklif formu içerisinde ki ürün fiyat hesaplamaları otomatik yapılmaktadır.

## Özellikler

- Laravel ile geliştirilmiş ve blade template kullanılmıştır.
- Css için tailwind framework kullanıldı
- **PostgreSQL** veritabanı kullanıldı.
- **Docker ve Docker Compose** ile kolayca çalıştırılabilir.
- Fiyat hesaplamaları ve yazıya çevrim özelliklerine sahiptir.

## Kurulum

### Gerekli Araçlar

- Docker
- Git

### Adımlar

1. **Depoyu Klonla**

   ```bash
   git git@github.com:musacivak/offer-management.git
   cd offer-management

2. **Docker Compose ile Projeyi Çalıştırma**
   
   ```bash
   npm install
   npm run build    
   docker-compose up -d --build

Bu komutlar, gerekli tüm bagımlılıkları yükler ve Docker konteynerlerini (PHP, Nginx, PostgreSQL) başlatır ve projeyi ayaga kaldırır.

3. **Veritabanı Migration ve Seed İşlemleri**

Proje başlatıldığında veritabanı otomatik olarak sıfırlanacak, migration'lar ve seed'ler çalıştırılacaktır. Bu sayede veritabanınız otomatik olarak güncellenir.

4. **Projeye Erişim**

Proje çalıştıktan sonra, projeye a Nginx aracılığıyla local adresinizden erişebilirsiniz.

**Fiyat Hesaplama**
Proje, girilen ürün kalemleri ve adetleri ile fiyatlar otomatik hesaplanır ve yazı ile olan versiyonuda oluşturulur. 
