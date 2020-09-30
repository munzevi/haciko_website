# Laravel 6 Custom CMS
### Özellikleri
1. Spatie Role and Permission paketine dayalı yetki ve rol listeleme, ekleme, silme ve düzenleme,
2. Kullanıcılar için listeleme, ekleme, silme ve düzenleme,
3. Ayarlar altında **Meta tagler, Genel Ayarlar, Sosyal Medya Hesapları, Mail Ayarları** kategorileri için listeleme, ekleme, silme ve düzenleme,
4. Çoklu dil desteği **Middleware henüz aktif edilmedi**, Dil listeleme, ekleme, silme ve düzenleme,
5. Unisharp File Manager paketi ile imaj ve dosya listeleme, ekleme, silme ve düzenleme
6. Sayfalara atanmak üzere slider oluşturma, düzenleme, silme ya da oluşturulmuşları listeleme,
7. Blog başlığı altında;
    1. Blog kategorileri CRUD,
    2. Blog Etiketleri CRUD,
    3. Blog Yazıları CRUD
8. Sayfa CRUD işlemlerinde önemli olan
    1. herhangi bir sayfa bir diğerininin parent ya da child'i olabilir,
    2. her sayfa "show_on_menu" seçeneği aktif ise menü'de listelenir,
    3. "show_at_parent" seçeneği seçildiyse sayfanın özeti üst sayfasında listelenir,
    4. title ve subtitle alanlarını içermekle birlikte, hareketli ve çok sloganlı sayfaların gerekliliği üzerine ihtiyaç kadar çoğaltılabilen **ekstra alanlar** kolonu oluşturuldu; bu alan standartize edilemeyen tüm verileri kapsamaktadır


### Eksikleri
+ blog categori update metodu 404 veriyor
+ meta taglere schema.org Json'ı eklenmeli
+ posts eklerken tag'ler için slimjs çalışmıyor
+ content'lerden yalnızca anasayfa update edilirken internal 500 veriyor
+ layouts'lar eklenmeli
+ dizin yapısı düzenlenmeli
+ başarılı işlem uyarısı
+ menünün dinamik hale sokulması


filemanager 404 hatası için uygun çözüm bulana kadar tek yöntem vendor/unisharp/LaravelFilemanagerServiceProvider 'deki Route::group fonksiyonuna prefixi manuel eklemek, yani line 41;
            Route::group(['prefix' => 'admin/filemanager', 'middleware' => ['web', 'auth']], function () {
                \UniSharp\LaravelFilemanager\Lfm::routes();
            });
tabi storage:link ile dizin yetkilerini -folder 644 file 755- unutmamak gerek.