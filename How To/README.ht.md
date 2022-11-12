<p align="center">
<img src="../banner.png?v=1" alt="Laravel+Moncash">
</p>

# Eksplikasyon

Nou pral eksplike kijan ou ka entegre MonCash nan on sit Laravel. Sit ou pral fè a li kapab on sit pou vann oswa resevwa
don. Nou pral
swiv [dokiman ofisyèl MonCash](https://sandbox.moncashbutton.digicelgroup.com/Moncash-business/resources/doc/RestAPI_MonCash_doc.pdf)
la ou pou kominike ak API yo a.

Majorite enteraksyon nou pral fè ak API a nou pral sèvi
ak [Laravel\HTTP Client](https://laravel.com/docs/9.x/http-client) ou ka
verifye [dokimantasyon](https://laravel.com/docs/9.x/http-client) an pou wè kijan pou sèvi ak li.

## Boutton peye a

Kliyan ou yo ap bezwen wè se ak Digicel MonCash yo ka peye ou. Men kijan nou fè li nan demo a:

<p align="center">
<img src="../assets/images/demo5.jpg?v1" alt="" width="250">
</p>   

Ou ap jwenn lot egzanp boutton tou fèt, ou ka itilize, sou site pòtay administrayon MonCash la:

1) Ale nan
   seksyòn __[User Manual](https://sandbox.moncashbutton.digicelgroup.com/Moncash-business/Admin/Documentation)__ la.
2) Nan pati ki rele **MonCash Button PNG** la ou ap jwenn boutton nan plizyè lang.

```php
<?php
#./resources/view/payment.blade.php

define("BASE_BUTTON_PATH", "https://sandbox.moncashbutton.digicelgroup.com/Moncash-middleware/resources/assets/images/");  

// Gade nan ki lang serveur la ap travay pou session saa
$lang =App::currentLocale(); 
 
$button = match($lang){
    'ht' => 'MC_button_kr.png',
    'fr' => 'MC_button_fr.png',
    default => 'MC_button.png',
};

$url = BASE_BUTTON_PATH . $button;

?>
```

```html
<!-- ./resources/view/payment.blade.php -->

<!--Example using Bootstrap.css -->
<div class="card mt-2 mx-auto text-white bg-dark"
     style="max-width: 300px;">
    <div class="card-header">
        <div class="card-title">Peye ak MonCash</h4>
        </div>
        <div class="card-body">
            <small>Peye ak MonCash an Haiti.
                Se moyen ki pi fasil pou on moun peye an sekitite.
            </small>
            <img
                    src="{{ $url }}"
                    alt="moncash_button"
                    class="d-block my-2 mx-auto"
                    style="width: 150px;"
            />
        </div>
    </div>

```

<p align="center">
  <img src="../assets/images/bootstrapButton.jpg?v=2" width="300">
</p>

## Pèman

Pou ou pran on pèman fok ou kreye on demand, redirije kliyan an sou paj MonCash la epi pou MonCash ap redirije kliyan an
sou paj ou defini sou pòtay biznis la (Alert URL).

### Idantifyan

Kominikasyon ak API MonCash la fèt on jan ki sekirize pou evite kòb kliyan yo fè move rout. Lè ou ap kominike ak API a
ou gen fok ou di kiyès ou ye epi prouve se ou vre pa yon lòt moun.

Chak bizniz bezwen idantifyan MonCash pa li.

#### Username (client_id)

Pou di kiyes biznis la ye se ak **CLIENT_ID** a. Li se ekivalan `non itilizatè` (username) lè ou ap ouvri compte
Gmail/Youtube ou pa egzanp. Idantiyan saa inik, de (2) biznis diferan ap gen de (2) CLIENT_ID diferan.

CLIENT_ID a, se on idantifyan piblik, sa vle di tou mounn ka wè li epi di kiyès ou ye.

#### Password (client_secret)

__CLIENT_SECRET__ la se on idantifyan prive. Fòk ou proteje li pou moun pa konnen li. Li se on kle ki ase long epi
konpleks pou li enposib a devine.

Si ou ap ap travay pou on gwo konpani ki gen anpil devlopè, dev yo pa sipoze konnen kle saa evite pataje li. Menm si ou
mete li nan [fichier anvironman](https://laravel.com/docs/9.x/configuration) `.env` a epi ou inyore fivhier a lè ou ap
commit nan git sa pa anpeche li flite (leak an anglè). Pou sèvè pwodikson (live) biznis la li ankò pi frajil.

Gen plizyè prekosyon ou ka pran pou sa :

- Pa ekri li on kote moun ka wè, tankou nan kòd PHP a. Pito ou mete li nan variable environment serveur la oswa mete li
  nan fichye .env si ou pa gen pèmisyon an.
- Si ou ap sèvi ak fichier .env a pa pataje fichie a. Pa egzan, nan on sistèm jesyon vèsyon tankou Git mete li nan list
  fichye pou inyore a (.gitignore)
- Desaktive error reporting sou serveur la (lè on bug monte, log erè a ka afiche valè $client_id a nan detay Exception
  an)
- Pou server pwodiksyon an ou ka sèvi ak on kòfre fò digital an liy
  tankou [Google Cloud Secret Manager](https://cloud.google.com/secret-manager)
  ,  [AWS Secret Manager](https://aws.amazon.com/secrets-manager/)
  oswa [Azure Vault](https://azure.microsoft.com/en-us/products/key-vault/#product-overview) pami plzyè ki bay sèvis la.
- Rele API MonCash la sèlman a pati yon server, pa egzanpm pa itilize Javascript nan navigatè (browser) a pou fè li.

Nan version 1 API MonCash la se MonCash ki jenere tou de valè sa yo. Yo poko ba ou posibilite pou chanje sekrè a oswa
mete ondat ekspirasyon sou li. Nan politik sekirite biznis la li posib pou nou prevwa kontakte Digicel dirèteman pou fè
modifikasyon konsa. Li toujou bon pou nou gen diskisyon sou estrateji sekite ak kijan pou mitije risk, pou si anka ta
gen on problèm pou se pa lè pwoblèm nan pou n ap eseye jere sa. Peman se on baga ki sansib.

Ou ka jenn on examp fichier `.env` sou lien saa: [.env.example](../laravel-moncash-example/.env.example)

### Otorizasyon

Lè ou ap fè on pèman oswa lè ou bezwen verifye pèman an ou bezwen
on [otorizasyon](https://developer.mozilla.org/fr/docs/Web/HTTP/Headers/Authorization). Ou ap pase otorizasyon saa nan
antèt ([Header](https://developer.mozilla.org/fr/docs/Glossary/Request_header)) rekèt la a chak fwa. Yo rele fòm
kominikasyon saa on rekèt otantifye ak on Bearer
Token ([RFC 6750](https://tools.ietf.org/html/rfc6750))

Pa egzanp:

```php
use Illuminate\Support\Facades\Http;

$response = Http::withToken($access_token)->post(/* ... */);
```

Pou ou jwenn `access_token` saa fòk ou otantifyen ou sou API a. API a ap ba ou on jeton (token) [JWT](https://jwt.io).
Ou ka sèvi ak jeton saa pou on dire ki pa twò long. Kantite tan an tou ekri nan repons API a, le pli souvan li mwens ke
on minit.

Demand otorizasyon an li fèt ak yon rekèt otantifye Basic ( Basic
Authentication [RFC 7617](https://tools.ietf.org/html/rfc7617) ), kote ou ap gen pou bay `client_id` a kòm non
itilizatè (username) epi `client_secret` la kòm mo de pas (password).

Egzanp:

```php
define('HOST_REST_API',  'https://sandbox.moncashbutton.digicelgroup.com/Api'); // Pou server pwodiksyon an  https://moncashbutton.digicelgroup.com/Api

$clientId = config('moncash.clientId');
$clientSecret = config('moncash.clientSecret');


try{
    $response = Http::withBasicAuth($clientId, $clientSecret)
                ->post( 
                         HOST_REST_API . '/oauth/token', 
                         [
                            'scope'      => 'read,write',
                            'grant_type' => 'client_credentials'
                         ]
                       );
                       
    $response->throw();
    
    $access_token = $response['access_token'];
    $expires_in =  $response['expires_in']; // kantite tan an segond jeton an genyen avan li ekspire 
}catch ( Exception $e){
  // jere erreur la
}
```

Repons la ap sanble ak sa:

```json
{
  "access_token": "eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJzY29wZSI6WyJyZWFkLHdyaXRlIl0sImV4cCI6MTY2NzUzNzU5MCwianRpIjoiY2Q1MDgyN2MtZmMyYi00ODE2LWE3ZmEtMmRkMzFjMDA3ZmVhIiwiY2xpZW50X2lkIjoiNDZjMzk5MjIwNDhjNzYwOWI2MzAwYjAwZWE2NDRiM2EifQ.V4gLnfXX6GVb6OZ9RacbrKFRKCFKACEGoOqGYUiaCRgJIVtkty5iO55O5TVfGN6-CIxNHxTrCAk1PVbbFLYOxWzOYQZ7lxB4M1cxiYdguQ47iqKLflKNtQNX3BgX5hvEtdyJv1fZFVu2aedPSZOtTVc9mSAGXLx6_QfstCaet1hy3gO5sPW1nmmazu1ZNa-QVwnqaEIGLaPneRrZvH42cRTxO0YJXPCUK6gtDJa7CIKTsqq5YP2df1FDWWDHGUwXO7P-KNuo0BPGI-BtVVqmEYvPGefu8tcniX9UKOk9GOR27XCsOahrAJNbqKnhzGnhkbH3VI_Xd7e6fxc8FUUdGQ",
  "token_type": "bearer",
  "expires_in": 59,
  "scope": "read,write",
  "jti": "cd50827c-fc2b-4816-a7fa-2dd31c007fea"
}
```

NÒT 1: Ou ka jwenn egzanp fichye configirasyon sou lyen
saa: [./config/moncash.php](../laravel-moncash-example/config/moncash.php)

Pa bliye ou ap bezwen on `access_token` valid pou tout lot rekèt ou ap fè ak API a. Yon bon jan pou jere token la se
sere li pou kantite tan ou pral sèvi ak li a. Yon bon jan pou sere token la
se [Laravel Cache Facade](https://laravel.com/docs/9.x/cache) la.

Kach (Cache) la ka trè rapid si ou [configuire](https://laravel.com/docs/9.x/cache#redis) li
ak [Redis](https://laravel.com/docs/9.x/redis). Sa pral diminiye kantite tan on tranzaksyon pran.

Men yon examp fonksyon ki jere access_token la pou ou:

```php

class EgzanpAuthService(){

    const TTL = 50; // kantite tan on token genyen, nomalman se 59 men  sa ka rive distans pou ou te jwenn li ak servi ak li li gentan fini
    private string $this->clientId;
    private string $this->clientSecret;

     public function __construct(){
        private $this->clientId = config('moncash.clientId');
        private $this->clientSecret = config('moncash.clientSecret');
     }
    
    /* ... */
    
    public function getAccessToken():string
    {
        
        return  Cache::remember('users', $ttl, function () {

            $response = Http::withBasicAuth($this->clientId, $this->clientSecret)
                ->post( 
                         HOST_REST_API . '/oauth/token', 
                         [
                            'scope'      => 'read,write',
                            'grant_type' => 'client_credentials'
                         ]
                       );
            
            $response->throw();
            
            return $response['access_token'];
        });
    };

}
```

### Pèman

Gen 3 etap pou ou resevwa on pèman

1) Kreye on token sekirize pou token la
2) Sèvi ak token lan pou redirije kliyan an nan page MonCash la.
3) Konfirme peman an epi livre pwodwi a

#### Kreye token la

Pou ou kreye on payman ou bezwen on nimero refrerans inik, ak prix total la ki se on antye. Sa vle di:

- Fok ou jwenn on jan ou toujou voye on nimero referans inik
- Fok pri a pa gen vigil ladan: `100` bon ✔ men  `59.99` pa bon ❌

Pou nimero inik la ou ka sèvi ak on on UUID (Universally unique identifier). Gen algoritm UUID ki pi efikas ke lot men
sa pa vle di pap janm gen kolizyon. Risk la fèb et si sata rive API a ta sipoze rejete li, amwnes ke nimero a resikle.

Gen libreri tankou [ramsey/uuid](https://github.com/ramsey/uuid) pou PHP.

```php
use Ramsey\Uuid\Uuid;
$orderId = Uuid::uuid4()->toString();
```

⚠ Gen yon jan ki pi direk pou jen on nimero inik, men si sistèm la deploye sou plizyè server risk pou kolizyon an
ogmante ankò plis:

```php
$orderId = uniqid(rand(), true);
```

Saka rive tou ou ap èvi ak yon lòt biznis tankou upstream dropshipping ki yo menm ap ba ou on nimewo iniq. Ou ka sèvi ak
li tou.

Lè ou fin gen 2 enfomasyon sa yo ou ka kreye on demand pèman sekirize.:

```php
try{
  $auth = new EgzanpAuthService(); // Si nou sèvi ak egzanp anwo a pou jwenn token lan
  $access_token  = $auth->getAccessToken();
  $orderId = Uuid::uuid4()->toString();
  $amount= ceil(45.50); // 46 -> awondi li anwo pou biznis la pa fe defisi, ou ka fe li passe kom frè
  
  $response = Http::withToken($access_token)->postRaw(
    HOST_REST_API . '/v1/CreatePayment',
    '{"amount": ' . $amount .',"orderId": "'. $orderId .'"}'
  );
  
  $response->throw();
  
  $payment_token = $response['payment_token']['token'];
  
}catch(Exception $e){
    //...
}
```

Egzanp repons:

```json
{
  "mode": "sandbox",
  "path": "/Api/v1/CreatePayment",
  "payment_token": {
    "expired": "2022-11-04 02:31:49:031",
    "created": "2022-11-04 02:21:49:031",
    "token": "eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjU3MDQ0IiwicmVmIjoiZmJiODM1NDEtMmNkYy00M2M0LWFhYTAtNmMxNGM2YzZlZjU1IiwiY3J0IjoxNjY3NTQyOTA5MDMxLCJleHQiOjE2Njc1NDM1MDkwMzEsImFwaSI6dHJ1ZX0.pWhHeQynhMot_dIIfun0BJ2XwDY3i7WnRr8YztTIL-x_x0ivomqWAHtMRtv2x7sKnQATCZjOsjhoV1M5hk2EYAqHAhczDZmEr8kfba3zZNyp3R0qdCWcU3AhO_Un-bUQyyfjFWWuMp1r5aTjUDPN_B938Cppz8isWkHOlGyJ1G1WuQlgRf-dhDCf7Atg4eFUmIniJ0Hot9pwxb_Rw9vjLVe413fZFKySM4z_K4qX5_YLpHFs0EEDthhQLP1NOFxaVc4LXI6XbKU9oJT1TaByymbMJzjZx81q03qlosyg2sNvE_tXGv7ama1tmNPCt4zc2Z59FetnyUBS2Ft7_l1iRQ"
  },
  "timestamp": 1667542909043,
  "status": 202
}
```

#### Redirije kliyan an

Lè ou fin kreye token la ou ka redirije kliyan nan page MonCash la:

```php
define('GATEWAY_BASE', 'https://sandbox.moncashbutton.digicelgroup.com/Moncash-middleware');

$url = GATEWAY_BASE . '/Payment/Redirect?token='.$payment_token; // $reponse['payment_token']['token']

return redirect()->away($url);
```

Kliyan an pa antre informasyon li epi li ap resevwa on SMS pou konfirme se li.

<p align="center">
  <img src="../assets/images/clientform.png?v=3" width="300">
  <img src="../assets/images/otp.png?v=2" width="300">
</p>

Si tout bagay byen pase MonCash ap afiche nimewo transaksyon an avek on mesaj siksè. Lè kliyan an klike sou OK MoCash ap
redirije kliyan an nan paj ou te defini nan pòtay administrasyon an.

<p align="center">
  <img src="../assets/images/success.png?v=2" width="500">
</p>

Saa se on egzanp kote MonCash ajoute nimero transaction an nan fin URL la:

> https://www.boutik.ht/success?transactionId=2185774546

Ou chwazi URL saa nan pòtay la:
<p align="center">
  <img src="../assets/images/configURLs.png?v=2" width="400">
</p>

Ou ap remake gen 2 URL.

- Return URL , kote Moncash ap voye on notifikasyon pou ou
- Alert URL , kote <onCash ap redirije kliyan an

Pou notifikasyon an se on kominikasyon serveur a serveur. Sa ka rive kliyan an pa klike OK aprè tranzaksyon an fini. Gen
anpil reson ki ka fè sa, pami yo koneksyon kliyan an tombe e latriye. Se pou sa li pi bon ou se ak li ou sevi pou
finalize acha a.

Nou ka pran de ka yo:

- Nou sipoze kliyan an toujou klike sou OK epi li tounen sou page sikse a ( se li ki pi fasil)
- Nou pa rete tann kliyan an tounen, nou tann MonCash voye signal la direk sou sèrveur la ( se li ki pi fiable)

Nan tou lè de ka yo fok gen on kote ou kenbe enformasyon sou kisa kòmand la teye.

Pou sa nou ka kreye on modèl ke ke nou konekte avek base done MYSQL la paegzanp. Men ak kisa fichier migration an
samble:

```php
 Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->text('redirectionUrl');
            $table->json('cart');
            $table->string('orderID')->nullable();
            $table->string('transactionID')->nullable();
            $table->dateTime('expiration')->nullable();
            $table->float('amount')->nullable();
            $table->float('cost')->nullable();
            $table->string('message', 100)->nullable();
            $table->string('payer', 15)->nullable();
            $table->timestamps();
        });
```

Nou taka amelyore Shema saa nan fè orderID a inik.

Ou ap jwenn egzanp konplè a
nan [./databse/migration/...create_payments_table.php](../laravel-moncash-example/database/migrations2022_11_09_181520_create_payments_table.php)

Pou kreye fichier sa a:

```shell
php artisan make:migration create_payments_table
```

Lè ou fini kreye li ou ka migre li sou base done a

```shell
php artisan migrate
```

Kreye model la.

```php
class Payment extends Model
{
    use HasFactory;

    // konvèti cart la otomatikman an array pou aksè fasil
    protected $casts= [
        'cart'=> 'array'
    ];
}
```

Pwopriete (property) cart la se la nou mete toudetay komand la. Li ka on TEXT tou si bazdone a pa sipòte JSON.

Avan ou redirije kliyan an ou ka pèsiste tou enfòmasyon yo.

```php
  $payment = new Payment();

  $payment->redirectionUrl = $url; // Kenbe URL la men sa ka rive li expire
  $payment->amount =  $this->bigTotal;
  $payment->cart = $this->fruits;
  $payment->orderID =  $id;

  $payment->save();
```

Pi devan ou ka jwen li aprè:

```php
    $payment  = Payment::where('orderID' , $orderId)->first();
```

Nan tou 2 ka yo (signal ou redirection), li enportan pou ou pran enformasyon sou tranzaskyon an direkteman sou API
MonCash la, evalye li epi finalize.

Ou ka fè li na Controller Route la oswa nan Component la.

```php
use Illuminate\Support\Facades\Request;

$transactionId = Request::input('transactionId'); // 2185774546

$reponse =  Http::withToken($access_token)
                  ->postRaw(
                            HOST_REST_API . '/v1/RetrieveTransactionPayment',
                            '{"transactionId": "' . $transactionId .'"}'
                           );
                           
$is_success = $reponse['payment']['message'] === 'successful';

if($is_success){
    $orderId =  $reponse['payment']['reference'];
    $payment  = Payment::where('orderID' , $orderId)->with('user')->first(); // Si ou te asosye Payment la ak on user ou ka tou rale li
    
    $payment->user->notify(App\Notification\Success::class , ['orderId'=>$orderId, 'cart'=> $payment->cart]);
    
    App\Facade\DropShip::process($payment); // inalize tranzakyon an voye email pou user a
}
```

Nan egzanp saa nou tou rale user a si nou te asoye li. Li sipoze ke nou te asoye Payment la ak on user. Ou ka konsilte
dokimantsyon sou [Laravel Eloquent Relations](https://laravel.com/docs/9.x/eloquent-relationships) pou plis enfòmasyon.

Egzanp rezilta:

```json
{
  "path": "/Api/v1/RetrieveTransactionPayment",
  "payment": {
    "reference": "3ee53062-5213-4e66-8015-c3d79b4281ef",
    "transaction_id": "2185774546",
    "cost": 888,
    "message": "successful",
    "payer": "50937024301"
  },
  "timestamp": 1667840834886,
  "status": 200
}
```

<p>
<img src="../assets/images/footer.png?v=2" alt="" width="300">
</p>

