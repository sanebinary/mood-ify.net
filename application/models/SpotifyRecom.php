<?php
class SpotifyRecom extends CI_Model
{
    //spotify requires three compulsory seed values
    public $required_seeds;
    public $optional_seeds;

    //return all recommendation seeds 
    public function sunny()
    {
        //function will return this array
        $seeds = [];

        //variables
        $seed_proportion = $this->getRandSeeds();
        $seed_item_limit = 5;

        //public stuff
        $this->optional_seeds = array(
            'limit' => 12,
            'market' => 'ES',
        );

        //the default value for the required seeds  
        $this->required_seeds = array(
            //Utopia Overture, Bad Guy, We are young, under pressure, high hopes
            'seed_artists' => array('5Yds5mKbrnFDomw9sshRkT', '2Fxmhks0bxGSBdJ92vM42m', '3ehrxAhYms24KLPG8FZe0W', '2fuCquhmrzHpu5xcA1ci9x', '1rqqCSm0Qe4I9rUvWncaom'),

            'seed_genres' => array('rock', 'acoustic', 'pop', 'chill', 'classical'),

            //scary pockets;hyukoh; rex orange county; prep; tiên tiên
            'seed_tracks' => array('1e16kiJQtCTveTl7TQnkFN', '57okaLdCtv3nVBSn5otJkp', '7pbDxGE6nQSZVfiFdq9lOL', '31SBgHxc8eqZUk9MdveH42', '5OvCh1Nin8AGw7OkxYinBe'),
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
