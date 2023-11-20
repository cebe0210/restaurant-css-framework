<?php
echo //'<p>Contenu de l\'onglet Contact...</p>' .
    '<table class="table table-striped table-hover">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Message</th>
            <th>Action</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Cédric</td>
            <td>berthetcedric@gmail.com</td>
            <td>Bonjour, super votre resto, je voudrais réserver une table pour ce soir....</td>
            <td>   
                <button type="button" class="btn btn-danger btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                    </svg>
                </button>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Maurice</td>
            <td>Maurice@exemple.com</td>
            <td>Je voudrais vous suggérer une recette de sandwich au choco, original et cornichon. C\'est vraiment bon....</td>
        </tr>
    </table>';
?>
