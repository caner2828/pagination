
Symfony çerçevesinde kullanılan basit ama esnek bir sayfalama (pagination) yapısıdır.
Toplam sayfa sayısı, mevcut sayfa, rota parametreleri ve çeviri desteği gibi özelliklerle dinamik linkler üretir.

Amaç pagination işlemini herhangi bir ek kütüphane veya eklentiye ihtiyaç duymadan kolayca temel seviye bilgiyle  kullanılabilir bir şekilde yazmak.

Özellikler

Karmaşık queryler içeren sistemlere kolayca adapte edilebilme 

Prod / Local ortamına göre URL yönlendirmesi

İsteğe bağlı olarak routing parametreleri

Translator ile çok dilli projelere uygun bir search parametre yapısı(Translatoru controllerdan göndermek daha mantıklı olur göstermek için pagination da translatoru kullandım)

