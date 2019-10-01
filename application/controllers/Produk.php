<?php
Class Produk extends CI_Controller{

    var $API ="";

    function __construct() {
        parent::__construct();
        $this->API="http://localhost:8888/posapp/index.php";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    // menampilkan data produk dari shopify
    function index(){

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://example.com/api/....",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        $data['key'] = json_decode($response);
        $this->load->view('produk/list',$data);
    }

    // insert data produk
    function create()
    {
       
        $this->load->view('produk/add');
    }



    function create_action()
    {
       // post data ke shopify
        $variants = array(
        0 => array(
               "price" => $this->input->post('price'),
                "inventory_quantity" =>$this->input->post('stok')
            )
        );
        $images = array(
        0 => array(
               "src" => $this->input->post('img')
            )
        );

        $data = array(
        'product' => array(
                 "title" => $this->input->post('title'),
                 "body_html" => $this->input->post('body-html'),
                'variants' => $variants,
                 'images' => $images,
            )
        );


         
        $payload = json_encode($data);
         
        $ch = curl_init('http://example.com/api/....');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($payload))
        );
         
        $result = curl_exec($ch);
        curl_close($ch);
        echo json_encode($result);
 
        }


        function edit($id)
        {


           $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => "http://example.com/api/....".$id.".json",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "GET",
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);
            $data['key'] = json_decode($response);
            // print_r($data);
            $this->load->view('produk/edit',$data);
        }


        public function edit_action()
        {
            $variants = array(
            0 => array(
                   "price" => $this->input->post('price'),
                    "inventory_quantity" =>$this->input->post('stok')
                )
            );
            $images = array(
            0 => array(
                   "src" => $this->input->post('img')
                )
            );
            
            $data = array(
            'product' => array(
                     "title" => $this->input->post('title'),
                     "body_html" => $this->input->post('body-html'),
                    'variants' => $variants,
                     'images' => $images,
                )
            );
            $payload = json_encode($data);
            $ch = curl_init('http://example.com/api/....'.$this->input->post('id').'.json');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLINFO_HEADER_OUT, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($payload)));
         
            $result = curl_exec($ch);
            curl_close($ch);
            if($result)
            {
                redirect('produk');
            }
        
        }


        public function curl_del($id)
        {

                $ch = curl_init();

                curl_setopt_array($ch, array(
                  CURLOPT_URL => "http://example.com/api/..../".$id.".json",
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => "",
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 30,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => "DELETE",
                  CURLOPT_HTTPHEADER => array(
                    "Accept: */*",
                    "Accept-Encoding: gzip, deflate",
                  ),
                ));
                $result = curl_exec($ch);
                if($result){
                    redirect('produk');
                }
        }

    
}