<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CholPoints {

    public static function chol_points_age($age, $gender) {

        if ($gender == "Male") {
            $chol = 0;
            $int = 0;

            if ($age > $int) {

                if ($age >= 30 && $age <= 34) {

                    $chol = -1;
                } else if ($age >= 35 && $age <= 39) {

                    $chol = 0;
                } else if ($age >= 40 && $age <= 44) {

                    $chol = 1;
                } else if ($age >= 45 && $age <= 49) {

                    $chol = 2;
                } else if ($age >= 50 && $age <= 54) {

                    $chol = 3;
                } else if ($age >= 55 && $age <= 59) {

                    $chol = 4;
                } else if ($age >= 60 && $age <= 64) {

                    $chol = 5;
                } else if ($age >= 65 && $age <= 69) {

                    $chol = 6;
                } else if ($age >= 70 && $age <= 74) {

                    $chol = 7;
                } else {
                    echo 'Enter above 30';
                }
                return $chol;
            }
        } else if ($gender == "Female") {

            $chol = 0;
            $int = 0;

            if ($age >= 30 && $age <= 34) {
                $chol = -9;
            } else if ($age >= 35 && $age <= 39) {
                $chol = -4;
            } else if ($age >= 40 && $age <= 44) {
                $chol = 0;
            } else if ($age >= 45 && $age <= 49) {
                $chol = 3;
            } else if ($age >= 50 && $age <= 54) {
                $chol = 6;
            } else if ($age >= 55 && $age <= 59) {
                $chol = 7;
            } else if ($age >= 60 && $age <= 64) {
                $chol = 8;
            } else if ($age >= 65 && $age <= 69) {
                $chol = 8;
            } else if ($age >= 70 && $age <= 74) {
                $chol = 8;
            } else {
                echo 'Enter above 30';
            } return $chol;
        }
    }

    public static function cholesterol_chol_points($mg, $gender) {

        if ($gender == "Male") {

            $chol = 0;
            $int = 0;

            if ($mg > $int) {

                if ($mg > 0 && $mg < 160) {

                    $chol = -3;
                } else if ($mg >= 160 && $mg <= 199) {

                    $chol = 0;
                } else if ($mg >= 200 && $mg <= 239) {

                    $chol = 1;
                } else if ($mg >= 240 && $mg <= 279) {

                    $chol = 2;
                } else if ($mg >= 280) {

                    $chol = 3;
                }
            }
            return $chol;
        } else if ($gender == "Female") {

            $chol = 0;
            $int = 0;

            if ($mg > $int) {

                if ($mg > 0 && $mg < 160) {
                    $chol = -2;
                } else if ($mg >= 160 && $mg <= 199) {
                    $chol = 0;
                } else if ($mg >= 200 && $mg <= 239) {
                    $chol = 1;
                } else if ($mg >= 240 && $mg <= 279) {
                    $chol = 1;
                } else if ($mg >= 280) {
                    $chol = 3;
                }
            }
            return $chol;
        }
    }

    public static function hdl_chol_points($mg, $gender) {

        if ($gender == "Male") {
            $chol = 0;
            $int = 0;

            if ($mg > $int) {

                if ($mg < 35) {

                    $chol = 2;
                } else if ($mg >= 35 && $mg <= 44) {

                    $chol = 1;
                } else if ($mg >= 45 && $mg <= 49) {

                    $chol = 0;
                } else if ($mg >= 50 && $mg <= 59) {

                    $chol = 0;
                } else if ($mg >= 60) {

                    $chol = -2;
                }
            }
            return $chol;
        } else if ($gender == "Female") {
            $chol = 0;
            $int = 0;

            if ($mg > $int) {

                if ($mg < 35) {
                    $chol = 5;
                } else if ($mg >= 35 && $mg <= 44) {
                    $chol = 2;
                } else if ($mg >= 45 && $mg <= 49) {
                    $chol = 1;
                } else if ($mg >= 50 && $mg <= 59) {
                    $chol = 0;
                } else if ($mg >= 60) {
                    $chol = -3;
                }
            }
            return $chol;
        }
    }

    public static function systolic_chol_points($mm, $gender) {

        if ($gender == "Male") {


            $chol = 0;

            $int = 0;

            if ($mm > $int) {

                if ($mm < 120) {

                    $chol = 0;
                } else if ($mm >= 120 && $mm <= 129) {

                    $chol = 0;
                } else if ($mm >= 130 && $mm <= 139) {

                    $chol = 1;
                } else if ($mm >= 140 && $mm <= 159) {

                    $chol = 2;
                } else if ($mm >= 160) {

                    $chol = 3;
                }
            }
            return $chol;
        } else if ($gender == "Female") {
            $chol = 0;
            $int = 0;

            if ($mm > $int) {

                if ($mm < 120) {
                    $chol = -3;
                } else if ($mm >= 120 && $mm <= 129) {
                    $chol = 0;
                } else if ($mm >= 130 && $mm <= 139) {
                    $chol = 0;
                } else if ($mm >= 140 && $mm <= 159) {
                    $chol = 2;
                } else if ($mm >= 160) {
                    $chol = 3;
                }
            }
            return $chol;
        }
    }

    public static function diastolic_chol_points($mm, $gender) {

        if ($gender == "Male") {

            $chol = 0;

            $int = 0;

            if ($mm > $int) {

                if ($mm < 80) {

                    $chol = 0;
                } else if ($mm >= 80 && $mm <= 84) {

                    $chol = 0;
                } else if ($mm >= 85 && $mm <= 89) {

                    $chol = 1;
                } else if ($mm >= 90 && $mm <= 99) {

                    $chol = 2;
                } else if ($mm >= 100) {

                    $chol = 3;
                }
            }
            return $chol;
        } else if ($gender == "Female") {
            $chol = 0;
            $int = 0;

            if ($mm > $int) {

                if ($mm < 80) {
                    $chol = -3;
                } else if ($mm >= 80 && $mm <= 84) {
                    $chol = 0;
                } else if ($mm >= 85 && $mm <= 89) {
                    $chol = 0;
                } else if ($mm >= 90 && $mm <= 99) {
                    $chol = 2;
                } else if ($mm >= 100) {
                    $chol = 3;
                }
            }
            return $chol;
        }
    }

    public static function diabetes_chol_points($isDiabetes, $gender) {

        if ($gender == "Male") {
            $chol = 0;

            if ($isDiabetes == "Yes") {

                $chol = 2;
            } else if ($isDiabetes == "No") {

                $chol = 0;
            }

            return $chol;
        } else if ($gender == "Female") {

            $chol = 0;

            if ($isDiabetes == "Yes") {
                $chol = 4;
            } else if ($isDiabetes == "No") {
                $chol = 0;
            }
            return $chol;
        }
    }

    public static function smoker_chol_points($isSmoker, $gender) {

        if ($gender == "Male") {
            $chol = 0;

            if ($isSmoker == "Smoker") {

                $chol = 2;
            } else if ($isSmoker == "Non Smoker") {

                $chol = 0;
            }
            return $chol;
        } else if ($gender == "Female") {
            $chol = 0;

            if ($isSmoker == "Smoker") {
                $chol = 2;
            } else if ($isSmoker == "Non Smoker") {
                $chol = 0;
            }
            return $chol;
        }
    }

}
