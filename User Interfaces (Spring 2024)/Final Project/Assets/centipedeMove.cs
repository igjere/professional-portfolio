using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class centipedeMove : MonoBehaviour
{
    public float moveSpeed = 2f;
    public int hitPoints = 1;
    public LevelManager levelMan;

    private Rigidbody2D rb;
    private Vector2 movement;
    private int currentHits = 0;

    public AudioSource SoundPlayer;
    bool MouseOn = false;

    public AudioSource KillSound;

    void Start()
    {
        rb = GetComponent<Rigidbody2D>();
        ChangeDirection();
    }

    void Update()
    {
        RotateTowardsMovementDirection();
    }

    void FixedUpdate()
    {
        rb.velocity = movement * moveSpeed;
    }

    private void ChangeDirection()
    {
        float angle = Random.Range(0, 360) * Mathf.Deg2Rad;
        movement = new Vector2(Mathf.Cos(angle), Mathf.Sin(angle));
    }

    private void RotateTowardsMovementDirection()
    {
        float angle = Mathf.Atan2(movement.y, movement.x) * Mathf.Rad2Deg;
        rb.transform.rotation = Quaternion.AngleAxis(angle, Vector3.forward);
    }

    private void OnCollisionEnter2D(Collision2D collision)
    {
        ChangeDirection();
    }

    private void OnMouseOver()
    {
        if (MouseOn == false)
        {
            if (MainScript.ScreenReaderEnabled == true)
                SoundPlayer.Play();
            MouseOn = true;
        }
        Debug.Log(MouseOn);
    }

    private void OnMouseExit()
    {
        MouseOn = false;
        Debug.Log(MouseOn);
    }

    private void OnMouseDown()
    {
        StartCoroutine(KillBug());
    }

    private IEnumerator KillBug()
    {
        KillSound.Play();
        yield return new WaitForSeconds(0.3F);
        currentHits++;
        if (currentHits >= hitPoints)
        {
            levelMan.TermiteClicked();
            Destroy(gameObject);
        }
    }
}
