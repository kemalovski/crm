# CRM Challenge

# Kurulum
------
1. git clone https://github.com/kemalovski/crm.git
2. cd crm/app
3. composer update
4. cp .env.example .env
5. docker-compose up -d
6. docker exec -it laravel_app bash
7. php artisan migrate
8. php artisan db:seed
9. Postman Collection kodun içerisindedir.

Kullanıma hazır

# Laravel RESTful API Dokümantasyonu

## Genel Bakış

Bu API, çalışanlar ve görevler için CRUD işlemleri sağlar. API, RESTful prensiplere uygun şekilde tasarlanmış olup, güvenli erişim için bearer token tabanlı kimlik doğrulaması kullanmaktadır.

---

## Kimlik Doğrulama
- **Endpoint:** `POST /api/login`
- **Açıklama:** Kullanıcı adı (email) ve şifre ile kullanıcıyı doğrular ve bir access token döner.
- **Parametreler:**
  ```json
  {
    "email": "admin@admin.com",
    "password": "password"
  }
  ```

API uç noktalarına erişim için her istekte `Authorization` başlığında geçerli bir bearer token gönderilmelidir:

```
Authorization: Bearer {your_token}
```

---

## Uç Noktalar

### 1. **Çalışanları Listele**

- **Endpoint:** `GET /api/employees`
- **Açıklama:** Tüm çalışanları listeler.
- **Başarılı Yanıt Örneği:**
  ```json
  {
      "success": true,
      "message": "Çalışanlar başarıyla getirildi.",
      "data": [...]
  }
  ```

### 2. **Çalışan Detayı**

- **Endpoint:** `GET /api/employees/{id}`
- **Açıklama:** Belirtilen ID'ye sahip çalışanı getirir.
- **Başarılı Yanıt Örneği:**
  ```json
  {
      "success": true,
      "message": "Çalışan başarıyla getirildi.",
      "data": {...}
  }
  ```

### 3. **Yeni Görev Ekle**

- **Endpoint:** `POST /api/tasks`
- **Açıklama:** Yeni bir görev oluşturur. `employee_id`, `title` ve `status` gereklidir.
- **Başarılı Yanıt Örneği:**
  ```json
  {
      "success": true,
      "message": "Görev başarıyla oluşturuldu.",
      "data": {...}
  }
  ```

### 4. **Görev Güncelle**

- **Endpoint:** `PUT /api/tasks/{id}`
- **Açıklama:** Belirtilen görev için `title` ve `status` güncellemeleri yapılır.
- **Başarılı Yanıt Örneği:**
  ```json
  {
      "success": true,
      "message": "Görev başarıyla güncellendi.",
      "data": {...}
  }
  ```

### 5. **Çalışan Görevlerini Listele**

- **Endpoint:** `GET /api/employees/{id}/tasks`
- **Açıklama:** Belirtilen çalışana ait tüm görevleri listeler.
- **Başarılı Yanıt Örneği:**
  ```json
  {
      "success": true,
      "message": "Çalışan görevleri başarıyla getirildi.",
      "data": [...]
  }
  ```

### 6. **Görev Tamamlama**

- **Endpoint:** `PATCH /api/tasks/{id}/complete`
- **Açıklama:** Belirtilen görevin `status` değerini `completed` olarak günceller.
- **Başarılı Yanıt Örneği:**
  ```json
  {
      "success": true,
      "message": "Görev başarıyla tamamlandı.",
      "data": {...}
  }
  ```

---

## Hata Yanıtları

Hatalı bir istek yapıldığında, API aşağıdaki gibi bir hata yanıtı döner:

```json
{
    "success": false,
    "message": "Geçersiz istek.",
    "data": null
}
```

---

Bu dokümantasyon, çalışan ve görev yönetimi ile ilgili temel API uç noktalarını içermektedir.
