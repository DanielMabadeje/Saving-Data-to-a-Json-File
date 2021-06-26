var data= JSON.parse('{{ json_encode($data["products"]) }}')
        // var data={{ json_encode($data['products']) }}
// var data={{ $js_data }}
        
        // var data={{htmlspecialchars(json_encode($data["products"]), ENT_QUOTES, 'UTF-8')}}