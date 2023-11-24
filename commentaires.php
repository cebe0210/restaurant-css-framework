<?php
            echo '<div class="card-body">';           
            include 'config.php';
            try {
                $stmt = $conn->prepare("SELECT id, date, pseudo, etoile, titre, message FROM livreor");
                $stmt->execute();
                $result = $stmt->get_result();

                while ($row = $result->fetch_assoc()) {
                    echo '<div class="card col-12 col-md-10 col-xl-8 mb-3 mx-auto d-flex align-items-center">';
                    echo '<div class="card-header">';
                    echo 'Quote';
                    echo '</div';
                    echo '<div class="card-body">';
                    echo '<p class="card-text">' . htmlspecialchars($row['pseudo']) . ' - ' . htmlspecialchars($row['etoile']) .'</p>';
                    echo '<p class="card-text">' . htmlspecialchars($row['message']) . '</p>';
                    echo '</div>';
                    echo '<div class="card-footer">';
                    echo '<p class="card-text">By: ' . htmlspecialchars($row['pseudo']) . '</p>';
                    echo '</div>';
                    echo '</div>';
                }
            } catch (Exception $e) {
                echo "Erreur : " . $e->getMessage();
            } finally {
                if ($stmt !== null) {
                    $stmt->close();
                }
                $conn->close();
            }

            echo '</div>';
            ?>