<?php
class SpotifyRecom extends CI_Model
{
    //spotify requires three compulsory seed values
    public $required_seeds;
    public $optional_seeds;
    public $limit;

    //return all recommendation seeds 
    public function sunny()
    {
        //function will return this array
        $seeds = [];
        //variables
        $seed_proportion = $this->getRandSeeds();
        //public stuff
        $this->optional_seeds = array(
            'limit' => 12,
            'market' => 'US',
            'energy' => 0.75,
            'valence' => 0.65,
        );
        //the default value for the required seeds  
        $this->required_seeds = array(
            //Flyers, Em có chắc không, Psycho, under pressure, fancy
            'seed_tracks' => array('6VBQ4DF4fwPJNA96RbMQWT','17wevXT0DwStJFo9La7f3G', '3CYH422oy1cZNoo0GTG1TK', '5oidljiMjeJTWUGZ4TfFea', '60zxdAqWtdDu0vYsbXViA7'),

            'seed_genres' => array('rock', 'pop', 'alternative', 'k-pop','j-rock'),

            //hello sleepwalkers ; ngọt ; red velvet; son tung mtp; tiên tiên
            'seed_artists' => array('12CmFAwzxYnVtJgnzIysvm', '0V2DfUrZvBuUReS1LFo5ZI', '1z4g3DjTBBZKhvAroFlhOM', '5dfZ5uSmzR7VQK0udbAVpf', '5OvCh1Nin8AGw7OkxYinBe'),
        );
        //separate keys and values of the required seeds 
        //the separation is to make it easier to choose the seed values randomly 
        $seed_values = [];
        
        foreach ($this->required_seeds as $key => $value){
            array_push($seed_values, $value); 
        }

        //randomly select among the given values of these seeds so it fulfils the "seed proportion" variable 
        for ($x = 0; $x < count($seed_values); $x++) {
            shuffle($seed_values[$x]);
            for ($i = 0; $i < (count($seed_values[$x]) - $seed_proportion[$x]); $i++) {
                array_pop($seed_values[$x]);
            }
        }
        $i = 0;
        foreach ((array_keys($this->required_seeds)) as $key){
            $this->required_seeds[$key] = $seed_values[$i];
            $i++;
        }
        //merge optional seeds with the return seeds
        $seeds = array_merge($seeds, $this->optional_seeds);
        $seeds = array_merge($seeds, $this->required_seeds);
        return $seeds;
    }

    public function windy()
    {
        //function will return this array
        $seeds = [];
        //variables
        $seed_proportion = $this->getRandSeeds();
        $seed_item_limit = 5;

        //public stuff
        $this->optional_seeds = array(
            'limit' => 12,
            'market' => 'US',
            "liveness" => 0.14,
            "valence"=> 0.43,
            'key' => array(8,5),
        );

        //the default value for the required seeds  
        $this->required_seeds = array(
            //Đen, Da Lab, Bích Phương, Hans Zimmer, London Music Works
            'seed_artists' => array('1LEtM3AleYg1xabW6CRkpi','6zUWZmyi5MLOEynQ5wCI5f','5fa13NJjmn2uQ3dxZDi2Ge','0YC192cP3KPCRWx8zr8MfZ','0VeT7hHTJFJZcENGekjCsB'),

            'seed_genres' => array('rock', 'acoustic', 'pop', 'chill', 'classical'),

            //the winds of winter, toss a coin to ur witcher, dua nhau di tron, doi la di, ho keo phao
            'seed_tracks' => array('0wXNnmvuTP0jPMpAXakSs8', '2KMLGJ1mPfRE4GNdL92rl3', '1Axzkl935WrIsBwDqk90yQ', '6PdTW5kiBEG8fjflRwQWcz', '1mw7rNNKmR3F7bnyPxXfmS'),
        );

        //separate keys and values of the required seeds 
        //the separation is to make it easier to choose the seed values randomly 
        $seed_values = [];
        foreach ($this->required_seeds as $key => $value){
            array_push($seed_values, $value); 
        }

        //randomly select among the given values of these seeds so it fulfils the "seed proportion" variable 
        for ($x = 0; $x < count($seed_values); $x++) {
            shuffle($seed_values[$x]);
            for ($i = 0; $i < ($seed_item_limit - $seed_proportion[$x]); $i++) {
                array_pop($seed_values[$x]);
            }
        }

        $i = 0;
        foreach ((array_keys($this->required_seeds)) as $key){
            $this->required_seeds[$key] = $seed_values[$i];
            $i++;
        }

        //merge optional seeds with the return seeds
        $seeds = array_merge($seeds, $this->optional_seeds);
        $seeds = array_merge($seeds, $this->required_seeds);


        return $seeds;
    }

    public function rainy()
    {
        //function will return this array
        $seeds = [];
        //variables
        $seed_proportion = $this->getRandSeeds();
        $seed_item_limit = 5;

        //public stuff
        $this->optional_seeds = array(
            'limit' => 12,
            'market' => 'US',
            "energy" => 0.4,
            "acousticness"=> 0.8,
        );

        //the default value for the required seeds  
        $this->required_seeds = array(
            //Hoang Dung, Duc Phuc, Adele, Vũ, Lauv
            'seed_artists' => array('6OzE2OdvV2tGAxSBsBuZ74','5FWPIKz9czXWaiNtw45KQs','4dpARuHxo51G3z768sgnrY','4SHhui9S7lFYGHXikfneGo','5JZ7CnR6gTvEMKX4g70Amv'),

            'seed_genres' => array('emo', 'guitar', 'pop', 'chill', 'indie'),

            //Ngu Nghếch, Luminesce, Melted, Spriritual State:Nujabes, Phút ban đầu 
            'seed_tracks' => array('5WXk2gZnhA01GSSZtGcIRV', '25HLBWR3qPq4OQapA7xPXs', '0fXl8VsWUiIdJN0YDGey24', '0jkaVZIYepDPnB140eR1Uc', '5QZxwgUSEvcGgj8z8MfkUN'),
        );

        //separate keys and values of the required seeds 
        //the separation is to make it easier to choose the seed values randomly 
        $seed_values = [];
        foreach ($this->required_seeds as $key => $value){
            array_push($seed_values, $value); 
        }

        //randomly select among the given values of these seeds so it fulfils the "seed proportion" variable 
        for ($x = 0; $x < count($seed_values); $x++) {
            shuffle($seed_values[$x]);
            for ($i = 0; $i < ($seed_item_limit - $seed_proportion[$x]); $i++) {
                array_pop($seed_values[$x]);
            }
        }

        $i = 0;
        foreach ((array_keys($this->required_seeds)) as $key){
            $this->required_seeds[$key] = $seed_values[$i];
            $i++;
        }

        //merge optional seeds with the return seeds
        $seeds = array_merge($seeds, $this->optional_seeds);
        $seeds = array_merge($seeds, $this->required_seeds);


        return $seeds;
    }

    public function getRandSeeds()
    {
        $num_seeds = 3;
        $total = rand(3, 5);
        set_time_limit(10);
        $groups             = array();
        $group              = 0;

        while (array_sum($groups) != $total) {
            $groups[$group] = mt_rand(1, $total / mt_rand(1, $total));

            if (++$group == $num_seeds) {
                $group  = 0;
            }
        }
        if (count($groups) != $num_seeds) {
            return $this->getRandSeeds($total);
        }
        return $groups;
    }
}
