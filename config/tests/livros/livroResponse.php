<?php

return [
    '200'   => [
        [
            "CodL" => 1,
            "Titulo" => "Ultra Aprendizado 1",
            "Editora" => "HarperCollins Brasil",
            "Edicao" => 1,
            "AnoPublicacao" => "2021",
            "created_at" => "2023-12-22T22:07:42.000000Z",
            "updated_at" => "2023-12-22T22:07:42.000000Z",
            "autores" => [
                [
                    "CodAu" => 1,
                    "Nome" => "Scott Young 1",
                    "created_at" => "2023-12-22T22:07:24.000000Z",
                    "updated_at" => "2023-12-22T22:07:24.000000Z",
                    "pivot" => [
                        "LivroCodL" => 1,
                        "AutorCodAu" => 1
                    ]
                ],
                [
                    "CodAu" => 2,
                    "Nome" => "Scott Young 2",
                    "created_at" => "2023-12-22T22:07:29.000000Z",
                    "updated_at" => "2023-12-22T22:07:29.000000Z",
                    "pivot" => [
                        "LivroCodL" => 1,
                        "AutorCodAu" => 2
                    ]
                ]
            ],
        ]
    ],
    '201'   => [
        'message'   => 'Recurso Adicionado'
    ],
    '400'   => [
        'message' => 'Não foi possível adicionar livro'
    ],
    '401'   => [
        'message' => 'Não autenticado.'
    ],
];
