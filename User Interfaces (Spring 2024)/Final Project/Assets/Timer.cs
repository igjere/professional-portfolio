using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class Timer : MonoBehaviour
{
    public float CurrentTime = 0f;
    public float StartingTime = 30.0f;

    [SerializeField] Text CountdownTimer;

    void Start()
    {
        CurrentTime = StartingTime;
    }

    void Update()
    {
        CurrentTime -= 1 * Time.deltaTime;
        CountdownTimer.text = CurrentTime.ToString("0");

        if (CurrentTime <= 0)
        {
            CurrentTime = 0;
        }
    }
}