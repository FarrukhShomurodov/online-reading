<?php

return [
    'accepted' => ':attribute ni qabul qilishingiz kerak.',
    'active_url' => ':attribute maydoni yaroqsiz URL manzilini o‘z ichiga oladi.',
    'after' => ':attribute maydonida :date dan keyingi sana bo‘lishi kerak.',
    'after_or_equal' => ':attribute maydonida :date sana yoki undan keyingi sana bo‘lishi kerak.',
    'alpha' => ':attribute maydoni faqat harflardan iborat bo‘lishi mumkin.',
    'alpha_dash' => ':attribute maydoni faqat harflar, raqamlar, tirelar va pastki chiziqlardan iborat bo‘lishi mumkin.',
    'alpha_num' => ':attribute maydoni faqat harflar va raqamlardan iborat bo‘lishi mumkin.',
    'array' => ':attribute maydoni massiv bo‘lishi kerak.',
    'before' => ':attribute maydonida :date dan oldingi sana bo‘lishi kerak.',
    'before_or_equal' => ':attribute maydonida :date sana yoki undan oldingi sana bo‘lishi kerak.',
    'between' => [
        'numeric' => ':attribute maydoni :min va :max orasida bo‘lishi kerak.',
        'file' => ':attribute maydonidagi fayl hajmi :min va :max KB orasida bo‘lishi kerak.',
        'string' => ':attribute maydonidagi belgilarning soni :min va :max orasida bo‘lishi kerak.',
        'array' => ':attribute maydonidagi elementlar soni :min va :max orasida bo‘lishi kerak.',
    ],
    'boolean' => ':attribute maydoni mantiqiy qiymat bo‘lishi kerak.',
    'confirmed' => ':attribute maydoni tasdiqlash bilan mos kelmaydi.',
    'date' => ':attribute maydoni sana emas.',
    'date_equals' => ':attribute maydoni :date sana bilan teng bo‘lishi kerak.',
    'date_format' => ':attribute maydoni :format formatiga mos kelmaydi.',
    'different' => ':attribute va :other maydonlari bir-biridan farq qilishi kerak.',
    'digits' => ':attribute maydoni :digits raqamdan iborat bo‘lishi kerak.',
    'digits_between' => ':attribute maydoni :min va :max oralig‘ida bo‘lishi kerak.',
    'dimensions' => ':attribute maydonida rasmning noto‘g‘ri o‘lchamlari mavjud.',
    'distinct' => ':attribute maydonida takrorlangan qiymat mavjud.',
    'email' => ':attribute maydoni haqiqiy elektron pochta manzili bo‘lishi kerak.',
    'exists' => ':attribute uchun tanlangan qiymat noto‘g‘ri.',
    'file' => ':attribute maydoni fayl bo‘lishi kerak.',
    'filled' => ':attribute maydoni to‘ldirilishi shart.',
    'gt' => [
        'numeric' => ':attribute maydoni :value dan katta bo‘lishi kerak.',
        'file' => ':attribute maydonidagi fayl hajmi :value KB dan katta bo‘lishi kerak.',
        'string' => ':attribute maydonidagi belgilarning soni :value dan katta bo‘lishi kerak.',
        'array' => ':attribute maydonidagi elementlar soni :value dan katta bo‘lishi kerak.',
    ],
    'gte' => [
        'numeric' => ':attribute maydoni :value dan katta yoki teng bo‘lishi kerak.',
        'file' => ':attribute maydonidagi fayl hajmi :value KB dan katta yoki teng bo‘lishi kerak.',
        'string' => ':attribute maydonidagi belgilarning soni :value dan katta yoki teng bo‘lishi kerak.',
        'array' => ':attribute maydonidagi elementlar soni :value yoki undan katta bo‘lishi kerak.',
    ],
    'image' => ':attribute maydoni tasvir bo‘lishi kerak.',
    'in' => ':attribute uchun tanlangan qiymat noto‘g‘ri.',
    'in_array' => ':attribute maydoni :other da mavjud emas.',
    'integer' => ':attribute maydoni butun son bo‘lishi kerak.',
    'ip' => ':attribute maydoni haqiqiy IP manzil bo‘lishi kerak.',
    'ipv4' => ':attribute maydoni haqiqiy IPv4 manzil bo‘lishi kerak.',
    'ipv6' => ':attribute maydoni haqiqiy IPv6 manzil bo‘lishi kerak.',
    'json' => ':attribute maydoni JSON satr bo‘lishi kerak.',
    'lt' => [
        'numeric' => ':attribute maydoni :value dan kichik bo‘lishi kerak.',
        'file' => ':attribute maydonidagi fayl hajmi :value KB dan kichik bo‘lishi kerak.',
        'string' => ':attribute maydonidagi belgilarning soni :value dan kichik bo‘lishi kerak.',
        'array' => ':attribute maydonidagi elementlar soni :value dan kichik bo‘lishi kerak.',
    ],
    'lte' => [
        'numeric' => ':attribute maydoni :value dan kichik yoki teng bo‘lishi kerak.',
        'file' => ':attribute maydonidagi fayl hajmi :value KB dan kichik yoki teng bo‘lishi kerak.',
        'string' => ':attribute maydonidagi belgilarning soni :value dan kichik yoki teng bo‘lishi kerak.',
        'array' => ':attribute maydonidagi elementlar soni :value dan oshmasligi kerak.',
    ],
    'max' => [
        'numeric' => ':attribute maydoni :max dan katta bo‘lishi mumkin emas.',
        'file' => ':attribute maydonidagi fayl hajmi :max KB dan katta bo‘lishi mumkin emas.',
        'string' => ':attribute maydonidagi belgilarning soni :max dan ko‘p bo‘lishi mumkin emas.',
        'array' => ':attribute maydonidagi elementlar soni :max dan ko‘p bo‘lishi mumkin emas.',
    ],
    'mimes' => ':attribute maydoni quyidagi turdagi fayl bo‘lishi kerak: :values.',
    'mimetypes' => ':attribute maydoni quyidagi turdagi fayl bo‘lishi kerak: :values.',
    'min' => [
        'numeric' => ':attribute maydoni kamida :min bo‘lishi kerak.',
        'file' => ':attribute maydonidagi fayl hajmi kamida :min KB bo‘lishi kerak.',
        'string' => ':attribute maydonidagi belgilarning soni kamida :min bo‘lishi kerak.',
        'array' => ':attribute maydonidagi elementlar soni kamida :min bo‘lishi kerak.',
    ],
    'not_in' => ':attribute uchun tanlangan qiymat noto‘g‘ri.',
    'not_regex' => ':attribute maydonining formati noto‘g‘ri.',
    'numeric' => ':attribute maydoni son bo‘lishi kerak.',
    'password' => 'Noto‘g‘ri parol.',
    'present' => ':attribute maydoni mavjud bo‘lishi kerak.',
    'regex' => ':attribute maydonining formati noto‘g‘ri.',
    'required' => ':attribute maydoni to‘ldirilishi shart.',
    'required_if' => ':attribute maydoni :other :value bo‘lganda to‘ldirilishi shart.',
    'required_unless' => ':attribute maydoni :other :values bo‘lmasa to‘ldirilishi shart.',
    'required_with' => ':attribute maydoni :values mavjud bo‘lganda to‘ldirilishi shart.',
    'required_with_all' => ':attribute maydoni :values mavjud bo‘lganda to‘ldirilishi shart.',
    'required_without' => ':attribute maydoni :values mavjud bo‘lmaganda to‘ldirilishi shart.',
    'required_without_all' => ':attribute maydoni :values ning hech biri mavjud bo‘lmaganda to‘ldirilishi shart.',
    'same' => ':attribute va :other maydonlari mos kelishi kerak.',
    'size' => [
        'numeric' => ':attribute maydoni :size ga teng bo‘lishi kerak.',
        'file' => ':attribute maydonidagi fayl hajmi :size KB ga teng bo‘lishi kerak.',
        'string' => ':attribute maydonidagi belgilarning soni :size ga teng bo‘lishi kerak.',
        'array' => ':attribute maydonidagi elementlar soni :size ga teng bo‘lishi kerak.',
    ],
    'starts_with' => ':attribute maydoni quyidagi qiymatlardan biri bilan boshlanishi kerak: :values.',
    'string' => ':attribute maydoni satr bo‘lishi kerak.',
    'timezone' => ':attribute maydoni haqiqiy vaqt zonasini o‘z ichiga olishi kerak.',
    'unique' => ':attribute maydonining bunday qiymati allaqachon mavjud.',
    'uploaded' => ':attribute maydonini yuklab olish muvaffaqiyatsiz bo‘ldi.',
    'url' => ':attribute maydoni noto‘g‘ri URL formatiga ega.',
    'uuid' => ':attribute maydoni haqiqiy UUID bo‘lishi kerak.',
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    'attributes' => [
        'name' => 'Nomi',
        'name.ru' => 'Nomi Ru',
        'name.uz' => 'Nomi Uz',
        'title' => 'Sarlavha',
        'title.ru' => 'Sarlavha Ru',
        'title.uz' => 'Sarlavha Uz',
        'author_id' => 'Muallif',
        'description' => 'Tavsif',
        'description.ru' => 'Tavsif Ru',
        'description.uz' => 'Tavsif Uz',
        'is_active' => 'Faol',
        'publication_date' => 'Nashr sanasi',
        'categories' => 'Kategoriyalar',
        'tags' => 'Teglar',
        'genres' => 'Janrlar',
        'photos' => 'Rasmlar',
        'files' => 'Fayl',
        'files.ru' => 'Fayl Ru',
        'files.uz' => 'Fayl Uz',
        'books' => 'Kitoblar',
        'start_time' => 'Boshlanish vaqti',
        'end_time' => 'Tugash vaqti',
        'password' => 'Parol',
        'email' => 'Email',
        'book_id' => 'Kitob',
        'last_name' => 'Familiya',
        'text' => 'Matn',
        'ratting' => 'Reyting',
        'phone_number' => 'Telefon raqami',
        'is_view' => 'Ko‘rish',
        'news_category_id' => 'Kategoriyalar',
    ],
];
